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

Route::get('/landing-page', function () {
    return view('contents.landing-page');
});

Route::get('/dashboard-home', function () {
    return view('contents.dashboard-home');
});

Route::get('/login-page', function () {
    return view('contents.login-page');
});

Route::get('/register-page', function () {
    return view('contents.register-page');
});

Route::get('/payment-page', function () {
    return view('contents.payment-page');
});

Route::get('/add-payment', function () {
    return view('contents.add-payment');
});
