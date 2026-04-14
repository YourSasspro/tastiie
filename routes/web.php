<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Locale\ToggleLocaleController;
use App\Http\Middleware\LocaleManager;
use App\Models\Section;
use Illuminate\Support\Facades\Route;


Route::middleware(LocaleManager::class)
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');


        require __DIR__ . '/admin.php';
        require __DIR__ . '/auth.php';
        require __DIR__ . '/default.php';
    });


// Locale Toggle
Route::post('/change-locale', ToggleLocaleController::class);
// 
Route::get('/receive-mails', [HomeController::class, 'receiveMails']);
require __DIR__ . '/configs.php';
