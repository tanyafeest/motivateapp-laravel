<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function() {
    Route::get("/login", [AuthController::class, 'login'])->name("login");
    Route::get("/register", [AuthController::class, 'register'])->name("register");
    Route::get("/oauth", [AuthController::class, 'oauth'])->name("oauth");

    // social auth
    // --- Google
    Route::get('/oauth/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('oauth.google');
    Route::get('/oauth/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback']);

    // --- Facebook
    Route::get('/oauth/facebook', [App\Http\Controllers\AuthController::class, 'redirectToFacebook'])->name('oauth.facebook');
    Route::get('/oauth/goofacebookgle/callback', [App\Http\Controllers\AuthController::class, 'handleFacebookCallback']);

    // --- Instagram
    Route::get('/oauth/instagram', [App\Http\Controllers\AuthController::class, 'redirectToInstagram'])->name('oauth.instagram');
    Route::get('/oauth/instagram/callback', [App\Http\Controllers\AuthController::class, 'handleInstagramCallback']);

    // --- Twitter
    Route::get('/oauth/twitter', [App\Http\Controllers\AuthController::class, 'redirectToTwitter'])->name('oauth.twitter');
    Route::get('/oauth/twitter/callback', [App\Http\Controllers\AuthController::class, 'handleTwitterCallback']);

    // --- Apple
    Route::get('/oauth/apple', [App\Http\Controllers\AuthController::class, 'redirectToApple'])->name('oauth.apple');
    Route::get('/oauth/apple/callback', [App\Http\Controllers\AuthController::class, 'handleAppleCallback']);
});