<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'phone_no',
        'address',
        'city',
        'country',
        'zip_code',
        'state',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
