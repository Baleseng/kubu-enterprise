<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionAdminController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('home');
});

// User routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin routes
Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('register', [RegisteredAdminController::class, 'create'])->name('admin.register');
        Route::post('register', [RegisteredAdminController::class, 'store']);
        
        Route::get('login', [AuthenticatedSessionAdminController::class, 'create'])->name('admin.login');
        Route::post('login', [AuthenticatedSessionAdminController::class, 'login']);
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [AuthenticatedSessionAdminController::class, 'destroy'])->name('admin.logout');
    });
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    
    Route::get('/', [ProductController::class,'dashboard'])->name('admin'); 
    Route::get('/create', [ProductController::class,'create']);
    Route::post('/create', [ProductController::class, 'store'])->name('admin.create');
});


require __DIR__.'/auth.php';
