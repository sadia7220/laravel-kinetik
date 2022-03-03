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



Route::get('/', function () {
    return view('home');
});

Route::get('/create_customers', function () {
    return view('create_customers');
});

Route::get('/customers', function () {
    return view('customers');
});

Route::get('/toRegister', [App\Http\Controllers\AuthController::class, 'toRegister'])->name('toRegister');
Route::get('/allCustomers', [App\Http\Controllers\CustomerController::class, 'allCustomers'])->name('allCustomers');
Route::get('/createCustomers', [App\Http\Controllers\CustomerController::class, 'createCustomers'])->name('createCustomers');

// Route::get('/{vue_capture?}', function () {
//     return view('welcome');
// })->where('vue_capture', '[\/\w\.-]*');

// Route::get('/{any}', function () {
//     return view('welcome');
//  })->where('any', '.*');


// Route::get('{any}', function () {
//     return view('homepage');
// })->where('any','.*');