<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_id',
        'payment_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d M, Y h:i A', strtotime($value));
    }
}
