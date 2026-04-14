<?php

namespace App\Models;

use App\Models\Scopes\LatestRecordScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([LatestRecordScope::class])]
class NewsletterSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'is_subscribed',
    ];
}
