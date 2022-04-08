<?php

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use Stancl\Tenancy\Database\Models\Domain;
use Stancl\Tenancy\Events\InitializingTenancy;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

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




Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', function (Request $request) {
        return view('dashboard', [
            'clients' => $request->user()->clients,
            'personalClients' => Passport::$clientModel::where('name', 'Laravel Password Grant Client')->first(),
        ]);
    })->name('dashboard');
    Route::get('/clients', function (Request $request) {
        return view('clients', [
            'clients' => $request->user()->clients,
            'personalClients' => Passport::$clientModel::where('name', 'Laravel Password Grant Client')->first(),
        ]);
    })->name('dashboard.clients');

    Route::get('/tenants', function () {

        $tenant = Tenant::with('domain')->get();

        // dd($tenant[0]->domain->domain);

        return view('tenants', [
            'tenant' => $tenant
        ]);
    })->name('dashboard.tenants');


    Route::get('tenants/addForm', function (Request $request) {
        return view('addTenants');
    })->name('dashboard.tenants.addForm');

    Route::post('tenants/add', function (Request $request) {

        $url = config('app.url');
        $except_http = explode('http://', $url);
        $tenant = Tenant::create([
            'id' => $request->id
        ]);

        $tenant = $tenant->domains()->create([
            'domain' => $request->domain . '.' . $except_http[1],
        ]);

        return redirect()->route('dashboard.tenants');
    })->name('dashboard.tenants.add');

    Route::get('/tenants/delete/{id}', function ($id) {
        $tenant = Tenant::find($id);

        $tenant->delete();

        return redirect()->route('dashboard.tenants');
    })->name('dashboard.tenants.delete');
});

Route::get('tanvir', function () {
    return 'fuck you';
});

Route::get('/users', function () {
    return User::all();
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/signin', function () {
    return view('signin');
});
require __DIR__ . '/auth.php';
