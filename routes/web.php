<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
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
    return view('contents.landing-page');
});

// Route::get('/landing-page', function () {
//     return view('contents.landing-page');
// });

Route::get('/dashboard-home', function () {
    return view('contents.dashboard-home');
});

Route::get('/login-page', function () {
    return view('contents.login-page');
})->name('login-page')->middleware('guest');

Route::get('/register-page', function () {
    return view('contents.register-page');
})->middleware('guest');

Route::get('/payment-page', function () {
    return view('contents.payment-page');
});

Route::get('/transaction-page', function () {
    return view('contents.transaction-page');
});
Route::get('/add-transaction-page', function () {
    return view('contents.add-transaction-page');
});
Route::get('/transaction-page', [TransactionController::class, 'index']); // tampilkan data
Route::get('/add-transaction-page', [TransactionController::class, 'create']); // create data
Route::post('/add-transaction-page', [TransactionController::class, 'store']); // simpan data

Route::get('/edit-transaction-page/edit/{id}', [TransactionController::class, 'edit']);
Route::put('/edit-transaction-page/{id}', [TransactionController::class, 'update']);
Route::delete('/dashboard-delete-transaction/{id}', [TransactionController::class, 'destroy']);

Route::get('/add-payment', function () {
    return view('contents.add-payment');
});


Route::get('/comment-page', function () {
    return view('contents.comment-page');
});


Route::resource('dashboard-home', HomeController::class)->middleware('auth');
Auth::routes(['verify' => true]);
