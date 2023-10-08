<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InspirationController;
use App\Http\Controllers\InspirationScreenshotController;
use App\Http\Controllers\InspirationViewController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentSubScriptionCancelController;
use App\Http\Controllers\PaymentSubScriptionController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PymentCreateController;
use App\Http\Controllers\SpotifyCallbackController;
use App\Http\Controllers\SpotifyRedirectController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    // check share link exist in session
    Route::middleware('sharelink.confirm')->group(function () {
        // dashboard
        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        // inspiration
        Route::get('/inspiration', InspirationController::class)->name('inspiration');
        Route::get('/inspiration/card/{id}', InspirationViewController::class)->name('inspiration.card');

        // screnshot
        Route::get('/screenshot/{id}', InspirationScreenshotController::class)->name('screenshot');

        // payment
        Route::get('/upgrade', PymentCreateController::class)->name('upgrade');
        Route::get('/payment', PaymentController::class)->name('payment');

        // player
        Route::get('/player', PlayerController::class)->name('player');

        // settings
        Route::get('/settings', function () {
            return view('settings');
        })->name('settings');
    });

    Route::middleware('inspiration.onboarding.guard')->group(function () {
        Route::get('/inspiration/onboarding', OnboardingController::class)->name('inspiration.onboarding');
    });

    // --- Spotify
    Route::get('/oauth/spotify/redirect/{redirect_url}', SpotifyRedirectController::class)->name('oauth.spotify');
    Route::get('/oauth/spotify/callback', SpotifyCallbackController::class);

    // payment apis
    Route::post('/payment/subscription', PaymentSubScriptionController::class)->name('payment.subscription');
    Route::post('/payment/cancel', PaymentSubScriptionCancelController::class)->name('payment.subscription.cancel');
    Route::post('/payment/resume', PaymentSubScriptionCancelController::class)->name('payment.subscription.resume');
});
