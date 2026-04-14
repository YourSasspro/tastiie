<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';
    protected $fillable = ['name', 'slug','created_by','updated_by'];

    public function posts()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }

    public function setUniqueSlug($name)
    {
        $slug = Str::slug($name);
        if (static::whereSlug($slug)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        return $slug;
    }

    public function updateSlug($name)
    {
        $slug = Str::slug($name);
        if (static::whereSlug($slug)->where('id', '!=', $this->id)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        return $slug;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
