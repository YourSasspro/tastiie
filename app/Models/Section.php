<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public static $landingPageKey = 'landing_page';
    public static $blogPage = 'blog_page';
    public static $privacyPolicy = 'privacy_policy';
    public static $termsAndConditions = 'terms_and_conditions';
    public static $whoWeAre = 'who_we_are';
    public static $becomeALeader = 'become_a_leader';
    protected $fillable = [
        'key',
        'title',
        'description',
        'extra_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
