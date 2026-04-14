<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        // dd(Socialite::driver('google')->redirect());
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @param void
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        // dump($googleUser);
        $fullName = explode(' ', $googleUser->getName());
        $firstName = $fullName[0];
        $lastName = isset($fullName[1]) ? $fullName[1] : '';
    
        $user = User::where('email', $googleUser->email)->first();
        // dd($user);
        if (!$user) {
            $user = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'name'      => $googleUser->getName(),
                'email'     => $googleUser->email,
                'google_id' => $googleUser->id,
                'password'  => bcrypt('12345678'),
            ])->assignRole('User');
        }

        // Log the user in without needing credentials
        Auth::login($user);

        return to_route('home');
    }
}
