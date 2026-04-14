<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\AddToCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = AddToCart::where('user_id', getAuthUserId())->get();
        return view('web.user.cart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ], [
            'product_id.required' => __('validation.required', ['attribute' => __('gen.product')]),
            'product_id.exists' => __('validation.exists', ['attribute' => __('gen.product')]),
            'quantity.required' => __('validation.required', ['attribute' => __('gen.quantity')]),
            'quantity.numeric' => __('validation.numeric', ['attribute' => __('gen.quantity')]),
            'quantity.min' => __('validation.min.numeric', ['attribute' => __('gen.quantity')]),
        ]);

        $product = Product::find($request->product_id);

        $cart = AddToCart::where('user_id', getAuthUserId())
            ->where('product_id', $request->product_id)
            ->first();

        // Calculate the new total quantity if adding more of the same product
        $newQuantity = $cart ? ($cart->quantity + $request->quantity) : $request->quantity;

        // Check if the requested quantity exceeds available stock
        if ($newQuantity > $product->quantity) {
            return response()->json([
                'success' => false,
                'message' => __('gen.insufficient_stock', ['available' => $product->quantity]),
                'status' => 400,
            ], 400);
        }

        if ($cart) {
            $cart->update(['quantity' => $newQuantity]);
        } else {
            AddToCart::create([
                'user_id' => getAuthUserId(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => __('gen.product_added_to_cart'),
                'cart' => $cart,
                'status' => 200,
            ], 200);
        }

        return redirect()->route('carts.index')->with('message', __('gen.product_added_to_cart'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ], [
            'quantity.required' => __('validation.required', ['attribute' => __('gen.quantity')]),
            'quantity.numeric' => __('validation.numeric', ['attribute' => __('gen.quantity')]),
            'quantity.min' => __('validation.min.numeric', ['attribute' => __('gen.quantity')]),
        ]);

        $cart = AddToCart::find($id);

        if ($cart) {
            $product = Product::find($cart->product_id);

            // Check if the requested quantity exceeds available stock
            if ($request->quantity > $product->quantity) {
                return response()->json([
                    'success' => false,
                    'message' => __('gen.insufficient_stock', ['available' => $product->quantity]),
                    'status' => 400,
                ], 400);
            }

            $cart->update(['quantity' => $request->quantity]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' =>  __('gen.updated_successfully', ['attribute' => __('gen.cart')]),
                    'cart' => $cart,
                    'status' => 200,
                ], 200);
            }

            // return redirect()->route('carts.index')->with('message', __('gen.updated_successfully', ['attribute' => __('gen.cart')]));
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = AddToCart::find($id);

        if ($cart) {
            $cart->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => __('gen.deleted_successfully', ['attribute' => __('gen.cart')]),
                    'status' => 200,
                ], 200);
            }
            
            return redirect()->route('carts.index')->with('message', __('gen.deleted_successfully', ['attribute' => __('gen.cart')]));
        }
    }
}
