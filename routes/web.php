<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('components.adminDashboard');
});
Route::get('/viewer', function () {
    return view('components.viewerDashboard');
});

// Authentication Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'destroy']);

