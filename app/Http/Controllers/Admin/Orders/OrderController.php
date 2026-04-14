<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        
        $orders = Order::orderBy('created_at', 'desc')->with('user')->get();
        
        return view('admin.orders.index',compact('orders'));
    }

    public function show(string $id)
    {
        $order = Order::with('user','items','shippingAddress','payment')->findOrFail($id);
        return view('admin.orders.show',compact('order'));
    }

    public function changeStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);

        if($request->status == 'cancelled'){
            $order->items->each(function($item){
                $item->product->increment('quantity', $item->quantity);
            });
        }

        $order->update(['status' => $request->status]);
        return redirect()->back()->with('message', __('gen.order_status_updated_successfully'));
    }

    public function downloadPdf(string $id)
    {
        $order = Order::with('user','items','shippingAddress','payment')->findOrFail($id);
        $pdf = PDF::loadView('pdf.invoice.download-pdf', ['order' => $order]);
        return $pdf->download('order-'.$order->order_number.'.pdf');
    }

    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('message', __('gen.deleted_successfully',['attribute' => trans('gen.order')]));
    }
}

