<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionAdminController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;


Route::get('/home',[ProductsController::class, 'default'])->name('home');

// User routes
Route::middleware('auth:web')->group(function () {
    
//**********************************************************************************************//
//**************************************PRODUCTS CONTROLLER*************************************//
//**********************************************************************************************//
    Route::get('/',[ProductsController::class, 'index'])->name('dashboard');
    
    Route::get('/product/{id}', [ProductsController::class, 'product'])->name('product');

    Route::get('/example', [ProductsController::class, 'example'])->name('example');

//**********************************************************************************************//
//************************************PROFILE CONTROLLER****************************************//
//**********************************************************************************************//
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
//**********************************************************************************************//
//************************************CART CONTROLLER*******************************************//
//**********************************************************************************************//       
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');

//**********************************************************************************************//
//************************************CHECKOUT CONTROLLER***************************************//
//**********************************************************************************************//
    Route::get('/checkout',          [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
//**********************************************************************************************//
//************************************LOGOUT CONTROLLER***************************************//
//**********************************************************************************************//
    Route::post('logout',            [AuthenticatedSessionController::class, 'destroy'])->name('logout');

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

//**********************************************************************************************//
//**************************************ADMIN CONTROLLER****************************************//
//**********************************************************************************************//        
        Route::get('dashboard',               [AdminController::class,'dashboard'])->name('admin.dashboard');

//**********************************************************************************************//
//*************************************PRODUCT CONTROLLER***************************************//
//**********************************************************************************************//
        Route::get('/products',               [ProductController::class,'index'])->name('admin.products.index');
        
        Route::get('/products/post',          [ProductController::class,'create']);
        Route::post('/products/post',         [ProductController::class, 'store'])->name('admin.products.create');
        
        Route::get('/products/show/{id}',     [ProductController::class,'show'])->name('admin.products.show');
        
        Route::get('/products/edit/{id}',     [ProductController::class,'edit'])->name('admin.products.update');
        Route::patch('/products/edit/{id}',   [ProductController::class,'update']);
        
        Route::get('/products/archive/{id}',  [ProductController::class,'archive'])->name('admin.products.archive');
        Route::patch('/products/archive/{id}',[ProductController::class,'update']);
        Route::get('/products/publish/{id}',  [ProductController::class,'publish'])->name('admin.products.publish');
        Route::patch('/products/publish/{id}',[ProductController::class,'update']);

        Route::get('/products/report/{id}',   [ProductController::class,'report'])->name('admin.products.report');
        Route::delete('/products/{id}',       [ProductController::class,'destroy'])->name('admin.products.destroy');

//**********************************************************************************************//
//************************************SECTIONS CONTROLLER***************************************//
//**********************************************************************************************//
        Route::get('/sections',               [SectionController::class,'index'])->name('admin.sections.index');

        Route::get('/sections/add',           [SectionController::class,'create']);
        Route::post('/sections/add',          [SectionController::class, 'store'])->name('admin.sections.add');

        Route::get('/sections/edit/{id}',     [SectionController::class,'edit'])->name('admin.sections.edit');
        Route::patch('/sections/edit/{id}',   [SectionController::class,'update'])->name('admin.sections.update');

//**********************************************************************************************//
//************************************ADMINS CONTROLLER**************************************//
//**********************************************************************************************//
        Route::get('/members', [AdminController::class,'index'])->name('admin.members.index');
        Route::delete('/members/{id}', [AdminController::class,'destroy'])->name('admin.members.destroy');

        Route::get('/members/show/{id}', [AdminController::class,'show'])->name('admin.members.show');

        Route::get('/members/archive/{id}', [AdminController::class,'archive'])->name('admin.members.archive');
        Route::patch('/members/archive/{id}',[AdminController::class,'update']);


//**********************************************************************************************//
//************************************CUSTOMERS CONTROLLER**************************************//
//**********************************************************************************************//
        Route::get('/customers',[CustomerController::class,'index'])->name('admin.customers.index');
        
//**********************************************************************************************//
//************************************REPORTS CONTROLLER****************************************//
//**********************************************************************************************//
        Route::get('/reports', [ReportController::class,'index'])->name('admin.reports.index');

//**********************************************************************************************//
//*************************************LOGOUT CONTROLLER****************************************//
//**********************************************************************************************//
        Route::post('logout', [AuthenticatedSessionAdminController::class, 'destroy'])->name('admin.logout');  
    });
});




