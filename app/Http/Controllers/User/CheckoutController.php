<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\StripeService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderStoreRequest;
use App\Mail\SendNewOrderEmail;

class CheckoutController extends Controller
{
    protected $stripeService;
    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function index(){
        return view('web.user.checkout');
    }

    public function store(OrderStoreRequest $request)
    {   
        $request->validated();


        if(!count(getAuthUser()->carts))
        {
            return redirect()->route('checkout')
            ->with([
                'message' => __('gen.please_choose_the_product_first'),
                'type' => 'danger'
            ]);
        }

        // check product quantity before checkout
        foreach (getAuthUser()->carts as $cart) {
            if ($cart->quantity > $cart->product->quantity) {
                return redirect()->route('checkout')
                ->with([
                    'message' => __('gen.insufficient_stock', ['available' => $cart->product->quantity]),
                    'type' => 'danger'
                ]);
            }
        }

        $data = $request->all();
        $data['product_name'] = "Products";
        $amount = $request->total_amount;

        $currency = 'eur';


        // add order into session data
        session()->put('orderRequest', $request->all());


        // if ($request->payment_method == 'stripe') {

            $successUrl = route('checkout.stripe.success');
            $cancelUrl = route('checkout.stripe.cancel');

            try {

                // make the line items dynamic
                $lineItems = [];
                foreach (getAuthUser()->carts as $cart) {
                    $lineItems[] = [
                        'price_data' => [
                            'currency' => $currency,
                            'product_data' => [
                                'name' => $cart->product?->name ?? 'Product',
                                'images' => [$cart->product?->image ? $cart->product?->image : '']
                            ],
                            'unit_amount' => $cart->price * 100,
                        ],
                        'quantity' => $cart->quantity ?? 1,
                    ];
                }


                // Create a checkout session and redirect
                $redirectUrl  = $this->stripeService->stripeCheckout($data, $successUrl, $cancelUrl, $currency, $amount, $lineItems);
                
                if ($redirectUrl) {
                    return redirect($redirectUrl);
                } else {
                    return redirect()->route('checkout.stripe.cancel')
                    ->with([
                        'message' => __('gen.unable_to_initiate_payment'),
                        'type' => 'danger'
                    ]);
                }
            } catch (\Exception $e) {
                return redirect()->route('checkout')->with(['message' => $e->getMessage(), 'type' => 'danger']);
            }
        // }
    }


    public function stripeSuccess(Request $request,)
    {
        $sessionId = $request->query('session_id');
        $response = $this->stripeService->stripeCheckoutSuccess($sessionId);

        if ($response) {
            $orderData = $response['session_data'];
            $cardDetails = $response['payment_method'];
            $transactionId = $response['transaction_id'] ?? '';

            try {
                $orderRequest = session()->get('orderRequest');

                $this->createOrder($orderRequest,$transactionId);

                // Return success message or redirect
                return redirect()->route('orders.index')
                ->with([
                    'message' =>  __('gen.order_placed_successfully'),
                    'type' => 'success'
                ]);
            } catch (\Exception $e) {
                // Handle any errors, log if necessary
                Log::error('Transaction failed: ' . $e->getMessage());
                return redirect()->route('checkout')->with(['message', $e->getMessage(), 'type' => 'danger']);
            }
        } else {
            return redirect()->route('checkout.stripe.cancel')
            ->with([
                'message' => __('gen.failed_to_retrieve_payment_details'),
                'type' => 'danger'
            ]);
        }
    }

    private function createOrder($orderRequest, $transactionId,)
    {

        DB::transaction(function () use ($orderRequest, $transactionId) {

            // decreament the quantity
            foreach (getAuthUser()->carts as $cart) {
                if ($cart->product?->quantity >= $cart->quantity) {
                    $cart->product?->decrement('quantity', $cart->quantity);
                }
            }

            // Create the order record
            $order = Order::create([
                'order_number' => Order::generateUniqueOrderNumber(),
                'user_id' => getAuthUserId(),
                'payment_method' => $orderRequest['payment_method'],
                'total_amount' => $orderRequest['total_amount'],
                'discount' => $orderRequest['discount'] ?? 0,
                'shipping' => $orderRequest['shipping'] ?? 0,
                'payment_status' => 'paid',
                'status' => 'pending',
                'order_date' => now(),
                'note' => $orderRequest['note'] ?? null,
            ]);

            // Store the order items
            foreach (getAuthUser()->carts as $cart) {
                $order->items()->create([
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price,
                    'subtotal' => $cart->quantity * $cart->price,
                ]);
            }

            // Store the shipping address
            $order->shippingAddress()->create([
                'name' => $orderRequest['first_name'] . ' ' . $orderRequest['last_name'],
                'email' => $orderRequest['email'],
                'phone_no' => $orderRequest['phone_no'],
                'address' => $orderRequest['address'],
                'city' => $orderRequest['city'],
                'country' => $orderRequest['country'],
                'zip_code' => $orderRequest['zip_code'],
                'state' => $orderRequest['state'],
            ]);

            // Store the payment details with the transaction ID
            $order->payment()->create([
                'payment_method' => $orderRequest['payment_method'],
                'payment_status' => 'paid',
                'amount' => $orderRequest['total_amount'],
                'transaction_id' => $transactionId ?? null,
                'payment_date' => now(),
            ]);

            // Clear the cart
            getAuthUser()->carts()->delete();

            // Clear the session
            session()->forget('orderRequest');

        });
    }

    public function stripeCancel()
    {
        session()->forget('orderRequest');
        return redirect()->route('checkout')
        ->with([
            'message' => __('gen.payment_has_been_cancel'),
            'type' => 'danger'
        ]);
    }
    
    public function destroy($id)
    {
        // 1. Find the cart item belonging to the authenticated user
        $cartItem = Cart::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found or unauthorized.'
            ], 404);
        }

        // 2. Delete the item
        $cartItem::delete();

        // 3. Return a JSON response for the AJAX call
        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart successfully.'
        ]);
    }



}
