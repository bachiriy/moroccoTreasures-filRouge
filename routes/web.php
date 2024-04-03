<?php

use App\Http\Controllers\Auth\ForgotPWController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPWController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIfUserAdmin;
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
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(CheckIfUserAdmin::class);
    // user
    Route::get('/profile', [UserController::class , 'index']);
    Route::put('/user/general-update', [UserController::class, 'gn_update']);
    Route::put('/user/password-update', [UserController::class, 'pw_update']);

});

Route::get('/about', function () {
    return view('about', ['page' => 'About']);
});
