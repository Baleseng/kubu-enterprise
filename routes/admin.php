<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredAdminController::class, 'create'])
                ->name('admin.register');
    
    Route::post('register', [RegisteredAdminController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Add other protected admin routes here
});