<?php

use App\Http\Controllers\FilterByCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\ValidateContact;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// filter by category
Route::post('/shop/{category_id}', [FilterByCategoryController::class, 'handle']);

// contact 
Route::post('/contact', [ContactController::class, 'handle'])->middleware(ValidateContact::class);