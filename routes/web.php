<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'back-history-prevent'],function(){

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginAttemt'])->name('login');


Route::get('/register', function () {
    return view('register');
});

Route::middleware(['authenticate'])->group(function () {

    Route::get('/create_customers', function () {
        return view('create_customers');
    });
    
    Route::get('/customers', function () {
        return view('customers');
    });
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

});

});

