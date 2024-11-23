<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/login', 'login')->name('auth.login');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/client.php';
require __DIR__ . '/employee.php';
