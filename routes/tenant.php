<?php

declare(strict_types=1);

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,

])->group(function () {
    Route::get('/', function () {

        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::get('/test', function () {

        return 'Welcome to the test route of the tenant application ' . tenant('id');
    });

    Route::get('/users', function () {

        $user = User::all();
        return view('addUsers', [
            'users' => $user
        ]);
    });

    Route::get('/tenants', function () {
        $tenants = Tenant::all();

        return view('tenants', [
            'tenant' => $tenants
        ]);
    });

    Route::post('/users/add', function (Request $request) {
        $user = User::add($request->all());
        view('addTenants');
        return redirect('/users');
    });
});
