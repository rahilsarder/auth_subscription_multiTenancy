<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PremiumProductsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubscribedUsersController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Auth::routes();
Route::post('user/signup', [AuthController::class, 'signup']);
Route::post('user/login', [AuthController::class, 'login']);
Route::post('auth/refresh', [AuthController::class, 'refreshToken']);

// Protected Routes Passport
Route::middleware(['auth:api'])->group(function () {
    Route::get('products', [ProductsController::class, 'index']);
    Route::get('users', [AuthController::class, 'getRelation']);
    Route::post('subscription/plans/create', [SubscriptionController::class, 'store']);
    Route::post('subscription/subscribe', [SubscribedUsersController::class, 'store']);
    Route::prefix('premium')->group(function () {
        Route::get('products', [PremiumProductsController::class, 'index']);
    });
});
