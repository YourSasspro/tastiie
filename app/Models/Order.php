<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\OrderItem;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([OrderObserver::class])]
class Order extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime',
    ];
    
    protected $fillable = [
        'order_number',
        'payment_method',
        'payment_status',
        'discount',
        'shipping',
        'total_amount',
        'date',
        'note',
        'user_id',
        'status',
    ];
    
    
    
    public static function generateUniqueOrderNumber()
    {
        $orderNumber = rand(100000, 999999);
        if (static::where('order_number', $orderNumber)->exists()) {
            return static::generateUniqueOrderNumber();
        }
        return $orderNumber;
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function payment()
    {
        return $this->hasOne(OrderPayment::class);
    }


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M, Y h:i A');
    }

}
