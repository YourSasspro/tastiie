<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model
{
    protected $fillable = [
        'key',
        'platform',
        'link',
        'created_by',
        'updated_by',
    ];
}
