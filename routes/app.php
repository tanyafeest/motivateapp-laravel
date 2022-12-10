<?php

use App\Http\Controllers\OAuthContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // inspiration
    Route::get('/inspiration', function () {
        return view('inspiration');
    })->name('inspiration');

    // payment
    Route::get('/upgrade', [App\Http\Controllers\PaymentController::class, 'create'])->name('upgrade');
    Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('payment');
    Route::post('/payment/subscription', [App\Http\Controllers\PaymentController::class, 'subscription'])->name('payment.subscription');
    Route::post('/payment/cancel', [App\Http\Controllers\PaymentController::class, 'cancel'])->name('payment.subscription.cancel');

    // settings
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});