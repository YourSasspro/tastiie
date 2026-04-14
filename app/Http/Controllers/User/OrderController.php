<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
    public function index()
    {
        $orders = getAuthUser()?->orders;
        return view('web.user.orders.index',compact('orders'));
    }

    public function show(string $id)
    {
        $order = Order::with('user','items','shippingAddress','payment')->findOrFail($id);
        return view('web.user.orders.show',compact('order'));
    }

    public function downloadPdf(string $id)
    {
        $order = Order::with('user','items','shippingAddress','payment')->findOrFail($id);
        $pdf = PDF::loadView('pdf.invoice.download-pdf', ['order' => $order]);
        return $pdf->download('order-'.$order->order_number.'.pdf');
    }
}
