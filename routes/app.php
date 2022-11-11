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
});