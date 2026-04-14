<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Cache;

class UserObserver
{

    /**
     * Handle the User "creating" event.
     * 
     * Triggered BEFORE a user is created
     */
    public function creating(User $user)
    {
        $user->name = "{$user->first_name} {$user->last_name}";
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Cache::forget('users_list');

        // Loop through and notify each admin
        foreach (getSiteAdmins() as $admin) {
            $admin->notify(new NewUserNotification($user));
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        Cache::forget('users_list');
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        Cache::forget('users_list');
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
