<?php

use App\Http\Controllers\Auth\ForgotPWController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPWController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkRole;
use App\Http\Middleware\ValidateCategory;
use App\Http\Middleware\validateProduct;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', ['page' => 'Home']);
});


Route::middleware('guest')->group(function () {
    // login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    // forgot pw
    Route::get('/forgot-password', [ForgotPWController::class, 'index'])->name('password.forgot');
    Route::post('/forgot-password', [ForgotPWController::class, 'send_reset_link']);
    // reset pw
    Route::get('/reset-password/{token}', [ResetPWController::class, 'index'])->name('password.reset');
    Route::post('/reset-password', [ResetPWController::class, 'reset_pw'])->name('reset_pw');
});

// shop
Route::get('/shop', [ShopController::class, 'index']);

Route::middleware('auth')->group(function () {
    // logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    // Admin
    Route::middleware(checkRole::class . ':Super_Admin,Admin')->group(function () {
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/dashboard/users', [DashboardController::class, 'users']);
        Route::get('/dashboard/products', [DashboardController::class, 'products']);
        Route::get('/dashboard/requests', [DashboardController::class, 'requests']);
        // mng users
        Route::put('/dashboard/users/{user_id}', [UserController::class, 'update_role']);
        Route::delete('/dashboard/users/{user_id}', [UserController::class, 'destroy_user']);
        // seller requests
        Route::post('/dashboard/requests/{user_id}/approve', [SellerRequestController::class, 'approve']);
        Route::post('/dashboard/requests/{user_id}/deny', [SellerRequestController::class, 'deny']);
        // mng categories
        Route::resource('/dashboard/categories', CategoryController::class)->middleware(ValidateCategory::class);
    });
    // user
    Route::get('/profile', [UserController::class , 'index']);
    Route::put('/user/general-update', [UserController::class, 'gn_update']);
    Route::put('/user/password-update', [UserController::class, 'pw_update']);

    // products
    Route::middleware(checkRole::class . ':Seller,Super_Admin,Admin')->group(function(){
        Route::middleware(validateProduct::class)->group(function () {
            Route::put('/products/{product_id}', [ProductController::class, 'update']);
            Route::post('/products', [ProductController::class, 'store']);
        });
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/products/create', [ProductController::class, 'create']);
        Route::delete('/products/{product_id}', [ProductController::class, 'destroy']);
        Route::get('/products/{product_id}/edit', [ProductController::class, 'edit']);
    });

    // notifications
    Route::delete('/notifications', [NotificationController::class, 'clear_all']);

    // reviews
    Route::post('/create-review/{product_id}', [ReviewController::class, 'store']);
    Route::delete('/remove-review/{review_id}', [ReviewController::class, 'destroy']);

    // cart
    Route::get('/cart', [ShopController::class, 'cart']);
    Route::delete('/cart/{cart_id}', [CartController::class, 'destroy']);
    Route::post('/cart/{product_id}', [CartController::class, 'store']);

    // checkout
    Route::get('/checkout', [ShopController::class, 'checkout']);
});

Route::get('/about', function () {
    return view('Pages.about', ['page' => 'About']);
});

Route::get('/rate/{product_id}', [ReviewController::class, 'rate']);

// product details
Route::get('/products/{product_id}', [ProductController::class, 'show']);
