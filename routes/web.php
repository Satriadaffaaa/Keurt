<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
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
Route::get('/add-payment-page', function () {
    return view('contents.add-payment-page');
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

Route::get('/payment-page', [PaymentController::class, 'index'])->name('payment-page');
Route::get('/add-payment-page', [PaymentController::class, 'create'])->name('payment-create');
Route::post('/add-payment-page', [PaymentController::class, 'store']);

Route::get('/edit-payment-page/edit/{id}', [PaymentController::class, 'edit']);
Route::put('/edit-payment-page/{id}', [PaymentController::class, 'update']);
Route::delete('/dashboard-delete-payment/{id}', [PaymentController::class, 'destroy']);

// Route::get('/edit-payment-page/edit/{id}', [PaymantController::class, 'edit']);
// Route::put('/edit-paymant-page/{id}', [PaymantController::class, 'update']);
// Route::delete('/dashboard-delete-paymant/{id}', [PaymantController::class, 'destroy']);

Route::get('/comment-page', function () {
    return view('contents.comment-page');
});


Route::resource('trasaction-page', HomeController::class)->middleware('auth');
Auth::routes(['verify' => true]);

Route::get('dashboard-home', [TransactionController::class, 'index'])->name('dashboard-home');
Route::resource('transactions', TransactionController::class);

use App\Http\Controllers\ChatController;

Route::get('/comment-page', [ChatController::class, 'index'])->name('comment-page');
Route::post('/comment-page', [ChatController::class, 'store'])->middleware('auth');