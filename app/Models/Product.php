<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'short_description',
        'ingredients',
        'allergens',
        'preparation_advice',
        'weight',
        'nutritional_values',
        'dietary_preferences',
        'expiry_date',
        'image',
        'status',
        'quantity',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'nutritional_values' => 'array',
        'dietary_preferences' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // delete image from storage
    public function deleteImage()
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function availabilities()
    {
        return $this->hasMany(ProductAvailability::class);
    }


    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating');
    }
}
