<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // check share link exist in session
    Route::middleware('sharelink.confirm')->group(function() {
        // dashboard
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    });

    // social auth
    // --- spotify
    Route::get('/oauth/spotify', [App\Http\Controllers\OAuthContoller::class, 'redirectToSpotify'])->name('oauth.spotify');
    Route::get('/oauth/spotify/callback', [App\Http\Controllers\OAuthContoller::class, 'handleSpotifyCallback']);

    // inspiration
    Route::get('/inspiration/onboarding', [App\Http\Controllers\InspirationController::class, 'onboarding'])->name('inspiration.onboarding');

    // stripe
    Route::get('/upgrade', [App\Http\Controllers\PaymentController::class, 'create'])->name('upgrade');
    Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('payment');
    Route::post('/payment/subscription', [App\Http\Controllers\PaymentController::class, 'subscription'])->name('payment.subscription');
    Route::post('/payment/cancel', [App\Http\Controllers\PaymentController::class, 'cancel'])->name('payment.subscription.cancel');

    // TODO: some features might need to restrict by EnsureUserIsSubscribed middleware
    Route::middleware('subscribed')->group(function() {
        Route::get('/test-subscribed', function() {
            return view('welcome');
        });
    });
});