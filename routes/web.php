<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'clients' => $request->user()->clients,
        'personalClients' => Passport::$clientModel::where('name', 'Laravel Password Grant Client')->first(),
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
