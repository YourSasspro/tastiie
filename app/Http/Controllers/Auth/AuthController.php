<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login a user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
                'message' => trans('gen.login_success_message'),
                'redirect' => route('home')
            ], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }
    }

    /**
     * Register a user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request)
    {
        $validatedData = $request->all();

        $validatedData['receive_daily_menu'] = isset($validatedData['receive_daily_menu']) && $validatedData['receive_daily_menu'] === 'on' ? true : false;

        // Create User
        $user = User::create($validatedData);

        // Attempt to login the user
        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => trans('gen.register_success_message'),
            'redirect' => route('home')
        ], 201);
    }
}
