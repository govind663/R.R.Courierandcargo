<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// ==== Authnication
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\HomeController;

// === Middleware for PreventBackHistory of Browser data
use App\Http\Middleware\PreventBackHistoryMiddleware;

// ==== Master
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return view('auth.login');
})->name('/');

Route::group(['prefix' => 'DTDC'],function(){
    // ======================= Admin Register
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

    // ======================= Admin Login/Logout
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login/store', [LoginController::class, 'authenticate'])->name('login.store');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['prefix' => 'DTDC','middleware'=>['auth', PreventBackHistoryMiddleware::class]],function(){
    // =============== Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ==== Update Password
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');

    // ==== Manage Company
    Route::resource('company', CompanyController::class);

    // ==== Manage Customer
    Route::resource('customer', CustomerController::class);

    // ==== Manage Units
    Route::resource('unit', UnitController::class);

    // ==== Manage Weights
    Route::resource('weight', WeightController::class);

    // ==== Manage Parcel
    Route::resource('parcel', ParcelController::class);
    Route::post('fetch_weight', [ParcelController::class,'fetch_weight_amt'])->name('fetch_weight');

    // ==== Manage Invoice
    Route::resource('invoice', InvoiceController::class);
    Route::post('invoice/get_parcel/index', [InvoiceController::class, 'getParcelList'])->name('invoice.getParcelList');

    // ==== Invoice PDF by customer wise
    Route::get('invoice/generateCustomerWisePDF/{id}/{customer_id}', [InvoiceController::class, 'generateCustomerWisePDF'])->name('invoice.generateCustomerWisePDF');
});


 // ========= Clear Route Cache from Browser
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

// ========= Clear Config Cache from Browser
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});


// ========= Clear Application Cache from Browser
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});


// ========= Clear View Cache from Browser
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
