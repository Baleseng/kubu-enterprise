<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionAdminController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;


Route::get('/home',[ProductsController::class, 'default'])->name('home');

// User routes
Route::middleware('auth:web')->group(function () {
    Route::get('/',[ProductsController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/product/{id}', [ProductsController::class, 'product'])->name('product');
    
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    Route::get('/example', [ProductsController::class, 'example'])->name('example');
});

require __DIR__.'/auth.php';

// Admin authentication
Route::prefix('admin')->group(function () {
    // Login routes
    Route::get('login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginAdminController::class, 'login']);
    
    // Registration routes (if needed)
    Route::get('register', [RegisteredAdminController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('register', [RegisteredAdminController::class, 'register']);
    
    // Protected admin routes
    Route::middleware(['auth:admin'])->group(function () {
        
        Route::get('dashboard', [ProductController::class,'dashboard'])->name('admin.dashboard');

        Route::get('/create', [ProductController::class,'create']);
        Route::post('/create', [ProductController::class, 'store'])->name('admin.create');
        
        Route::get('show', [ProductController::class,'show'])->name('admin.show');

        Route::get('edit', [ProductController::class,'edit'])->name('admin.edit');
        Route::patch('{id}', [ProductController::class,'update']);

        Route::get('region', [ProductController::class,'region'])->name('admin.region');

        Route::delete('destroy', [ProductController::class,'destroy'])->name('admin.delete');
        
        
        Route::post('logout', [LoginAdminController::class, 'logout'])->name('admin.logout');  
        
    });

});




