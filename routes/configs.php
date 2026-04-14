<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/artisan/migrate', function () {
    Artisan::call('migrate');
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/artisan/migrate-fresh-seed', function () {
    Artisan::call('migrate:fresh', [
        '--seed' => true,
    ]);
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/artisan/rollback-step-one', function () {
    $output = Artisan::call('migrate:rollback', [
        '--step' => 1
    ]);

    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/artisan/migrate-status', function () {
    Artisan::call('migrate:status');
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/artisan/optimize', function () {
    Artisan::call('optimize');
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/artisan/optimize-clear', function () {
    Artisan::call('optimize:clear');
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/artisan/storage-link', function () {
    Artisan::call('storage:link');
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});
Route::get('/artisan/queue-work', function () {
    Artisan::call('queue:work');
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/truncate-table/{table}', function ($table) {
    try {
        DB::statement("TRUNCATE TABLE `$table`");
        return response()->json(['success' => "Table `$table` has been truncated."]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('/artisan/rollback', function () {
    Artisan::call('migrate:rollback');
    $output = Artisan::output();
    return '<pre>' . $output . '</pre>';
});

Route::get('/refresh-migration-avail', function () {
    Artisan::call('migrate:refresh', [
        '--path' => 'database/migrations/2025_02_28_113239_create_product_availabilities_table.php',
        '--force' => true // Force running in production
    ]);

    return 'Migration refreshed successfully!';
});
