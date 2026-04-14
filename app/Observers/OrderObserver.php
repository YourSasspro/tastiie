<?php

namespace App\Observers;

use App\Models\Order;
use App\Mail\SendNewOrderEmail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewOrderNotification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        // Loop through and notify each admin
        foreach (getSiteAdmins() as $admin) {
            $admin->notify(new NewOrderNotification($order));
        }


        // send email to customer
        $content = '
            <h3>Hello, ' . $order->user?->name . '</h3>
            <p>Your order has been placed successfully</p>
            <p><strong>Order No:</strong> ' . $order->order_number . '</p>
            <p><strong>Total Amount:</strong> $' . number_format($order->total_amount, 2) . '</p>
            <p>Thank you for shopping with us!</p>
        ';
        Mail::to(getAuthUser()?->email)->queue(new SendNewOrderEmail('New Order Placed', $content, $order));


        // send email to admin
        foreach (getSiteAdmins() as $admin) {
            $adminContent = '
                <h3>Hello, '. $admin->name . '</h3>
                <p>A new order has been placed</p>
                <p><strong>Order No:</strong> ' . $order->order_number . '</p>
                <p><strong>Total Amount:</strong> $' . number_format($order->total_amount, 2) . '</p>
            ';
            Mail::to($admin->email)->queue(new SendNewOrderEmail('New Order Received', $adminContent, $order));
        }

    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
