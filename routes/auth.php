<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->group(function () {
        Route::post('login-user', [AuthController::class, 'login'])->name('login.user');
        Route::post('register-user', [AuthController::class, 'register'])->name('register.user');
    });
