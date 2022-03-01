<?php

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

// User Registration & Login Routes...
Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('/user/register', 'register');
    Route::post('/user/login', 'login');
});

// Customer Login Route...
Route::post('/customer/login', 'App\Http\Controllers\CustomerController@login')->name('customer.login.post');

// Customer Create & Login Routes...
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

    Route::controller(App\Http\Controllers\CustomerController::class)->group(function () {
        Route::get('/customers', 'index');
        Route::post('/customer/create', 'store');
    });

    Route::controller(App\Http\Controllers\BillController::class)->group(function () {
        Route::get('/bills', 'index');
        Route::post('/bill/create', 'store');

        Route::get('/bill/generateReport/{id}', 'generateReport');

        //Changing Customer's Bill'S Status from Due to Paid
        //Here id is the bill id
        Route::get('/bill/changeBillStatus/{id}', 'changeBillStatus');
    });

});

// Customer Home page after login
// Route::group(['middleware'=>'customer'], function() {
//     Route::get('/customer/home', 'App\Http\Controllers\CustomerController@index');
// })
