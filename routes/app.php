<?php

use App\Http\Controllers\OAuthContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // social auth
    // --- spotify
    Route::get('/oauth/spotify', [App\Http\Controllers\OAuthContoller::class, 'redirectToSpotify'])->name('oauth.spotify');
    Route::get('/oauth/spotify/callback', [App\Http\Controllers\OAuthContoller::class, 'handleSpotifyCallback']);
});