<?php

use App\Http\Controllers\Auth\ForgotPWController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPWController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIfUserAdmin;
use App\Http\Middleware\CheckIfUserSeller;
use App\Http\Middleware\validateProduct;
use Illuminate\Support\Facades\Route;

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
    Route::middleware(CheckIfUserAdmin::class)->group(function () {
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/dashboard/categories', [DashboardController::class, 'categories']);
        Route::get('/dashboard/users', [DashboardController::class, 'users']);
        Route::get('/dashboard/products', [DashboardController::class, 'products']);
        Route::get('/dashboard/requests', [DashboardController::class, 'requests']);
        // seller requests
        Route::post('/dashboard/requests/{user_id}/approve', [SellerRequestController::class, 'approve']);
        Route::post('/dashboard/requests/{user_id}/deny', [SellerRequestController::class, 'deny']);
    });
    // user
    Route::get('/profile', [UserController::class , 'index']);
    Route::put('/user/general-update', [UserController::class, 'gn_update']);
    Route::put('/user/password-update', [UserController::class, 'pw_update']);

    // products
    Route::middleware(CheckIfUserSeller::class)->group(function(){
        Route::resource('products',ProductController::class)->middleware(validateProduct::class);
        Route::get('/products/create', [ProductController::class, 'create']);

    });

    // notifications
    Route::delete('/notifications', [NotificationController::class, 'clear_all']);
});

Route::get('/about', function () {
    return view('about', ['page' => 'About']);
});
