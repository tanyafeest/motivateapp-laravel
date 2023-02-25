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
    // check share link exist in session
    Route::middleware('sharelink.confirm')->group(function() {
        // dashboard
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        // inspiration
        Route::get('/inspiration', [App\Http\Controllers\InspirationController::class, 'index'])->name('inspiration');
        Route::get('/inspiration/card/{id}', [App\Http\Controllers\InspirationController::class, 'view'])->name('inspiration.card');
        // payment
        Route::get('/upgrade', [App\Http\Controllers\PaymentController::class, 'create'])->name('upgrade');
        Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('payment');
        // player
        Route::get('/player', [App\Http\Controllers\PlayerController::class, 'index'])->name('player');
        // screnshot
        Route::get('/screenshot/{id}', [App\Http\Controllers\InspirationController::class, 'screenshot'])->name('screenshot');
        // settings
        Route::get('/settings', function () {
            return view('settings');
        })->name('settings');
    });

    Route::middleware('inspiration.onboarding.guard')->group(function() {
        Route::get('/inspiration/onboarding', [App\Http\Controllers\InspirationController::class, 'onboarding'])->name('inspiration.onboarding');
    });

    // --- Spotify
    Route::get('/oauth/spotify/redirect/{redirect_url}', [App\Http\Controllers\AuthController::class, 'redirectToSpotify'])->name('oauth.spotify');
    Route::get('/oauth/spotify/callback', [App\Http\Controllers\AuthController::class, 'handleSpotifyCallback']);

    // payment apis
    Route::post('/payment/subscription', [App\Http\Controllers\PaymentController::class, 'subscription'])->name('payment.subscription');
    Route::post('/payment/cancel', [App\Http\Controllers\PaymentController::class, 'cancel'])->name('payment.subscription.cancel');
});