<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InspirationOboardingController;

//Included Controllers
use App\Http\Controllers\PaymentCancelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentCreateController;
use App\Http\Controllers\PaymentSubscriptionController;
use App\Http\Controllers\SpotifyCallbackController;
use App\Http\Controllers\SpotifyRedirectController;
use App\Http\Controllers\TestSubScribedController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // TODO: some features might need to restrict by EnsureUserIsSubscribed middleware
    Route::middleware('subscribed')->group(function () {
        Route::get('/test-subscribed', TestSubScribedController::class);
    });

    Route::middleware('sharelink.confirm')->group(function () {
        // dashboard
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
    });
    // social auth
    // --- spotify
    Route::get('/oauth/spotify', SpotifyRedirectController::class)->name('oauth.spotify');

    Route::get('/oauth/spotify/callback', SpotifyCallbackController::class);

    // inspiration
    Route::get('/inspiration/onboarding', InspirationOboardingController::class)->name('inspiration.onboarding');

    // stripe
    Route::get('/upgrade', PaymentCreateController::class)->name('upgrade');

    Route::get('/payment', PaymentController::class)->name('payment');

    Route::post('/payment/subscription', PaymentSubscriptionController::class)->name('payment.subscription');

    Route::post('/payment/cancel', PaymentCancelController::class)->name('payment.subscription.cancel');

    // Process in the background by queue job
    Route::post('/sharingguodeance', function () {
        Artisan::queue('command:sharingguidance', [
            '--queue' => 'default',
        ]);
    });
    Route::post('/confirmsubscription', function () {
        Artisan::queue('command:confirmsubscription', [
            '--queue' => 'default',
        ]);
    });
});
