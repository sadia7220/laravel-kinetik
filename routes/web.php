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
    return view('welcome');
});

// Route::get('/billGenerated', function() {
//     return new BillGeneratedEmail();
// });

Route::get('/billGenerated', function() {

    event( new \App\Mail\BillGeneratedEmail('sadia_test@gmail.com') );

    //\Mail::to('sadia_test@gmail.com')->send(new \App\Mail\BillGeneratedEmail());

    return '<h1>Email Sent</h1>';
});