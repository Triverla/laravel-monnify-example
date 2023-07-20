<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToMonnifyGateway'])->name('pay');

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);

Route::get('/create-account', [App\Http\Controllers\AccountController::class, 'createVirtualAccount']);
Route::get('/get-account-details', [App\Http\Controllers\AccountController::class, 'getAccountDetails
']);
