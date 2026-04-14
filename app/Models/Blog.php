<?php

namespace App\Models;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['title','images','slug', 'content', 'category_id','created_by','updated_by'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function setUniqueSlug($title)
    {
        $slug = Str::slug($title);
        if (static::whereSlug($slug)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        return $slug;
    }

    public function updateSlug($title)
    {
        $slug = Str::slug($title);
        if (static::whereSlug($slug)->where('id', '!=', $this->id)->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        return $slug;
    }

    // delete image from storage
    public function deleteImage()
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image);
        }
    }

    // delete multiple images from storage
    public function deleteImages()
    {
        if ($this->images) {
            $images = json_decode($this->images, true);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function createdAt(){
        // return Carbon::parse($this->created_at)->diffForHumans();
        return Carbon::parse($this->created_at)->format('d M, Y');
    }

}
