<?php

use App\Http\Controllers\UserController;
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


Route::post('user/signup', [UserController::class, 'signup']);
Route::post('user/login', [UserController::class, 'login']);
Route::get('/auth/callback', [UserController::class, 'callback']);
Route::get('/auth/redirect', [UserController::class, 'customRedirect']);
Route::post('/testdado', function(Request $request){
    dd($request);
});