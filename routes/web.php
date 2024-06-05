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

Route::get('/transaction-page', [TransactionController::class, 'index'])->name('transaction-page'); // tampilkan data
Route::get('/add-transaction-page', [TransactionController::class, 'create'])->name('transaction-create');; // create data
Route::post('/add-transaction-page', [TransactionController::class, 'store'])->name('add-transaction-page'); // simpan data
Route::get('/generate-pdf', [TransactionController::class, 'generatePDF'])->name('pdf.generate');


Route::get('/edit-transaction-page/edit/{id}', [TransactionController::class, 'edit']);
Route::put('/edit-transaction-page/{id}', [TransactionController::class, 'update']);
Route::delete('/dashboard-delete-transaction/{id}', [TransactionController::class, 'destroy']);

Route::get('/add-payment', function () {
    return view('contents.add-payment');
});
// Route::get('/paymant-page', [PaymantController::class, 'index'])->name('paymant-page'); // tampilkan data
// Route::get('/add-paymant-page', [PaymantController::class, 'create'])->name('paymant-create');; // create data
// Route::post('/add-paymant-page', [paymantController::class, 'store'])->name('add-paymant-page'); // simpan data

// Route::get('/edit-payment-page/edit/{id}', [PaymantController::class, 'edit']);
// Route::put('/edit-paymant-page/{id}', [PaymantController::class, 'update']);
// Route::delete('/dashboard-delete-paymant/{id}', [PaymantController::class, 'destroy']);

Route::get('/comment-page', function () {
    return view('contents.comment-page');
});


Route::resource('trasaction-page', HomeController::class)->middleware('auth');
Auth::routes(['verify' => true]);
