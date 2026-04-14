<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAvailability extends Model
{
    protected $table = 'product_availabilities';
    protected $fillable = ['product_id', 'available_date', 'start_time', 'end_time'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
