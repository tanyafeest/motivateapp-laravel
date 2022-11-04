<?php

use App\Http\Controllers\OAuthContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function() {
    Route::get("/login", [AuthController::class, 'create'])->name("login");

    Route::get("/register", [RegisterController::class, 'create'])->name("register");

    Route::get("/oauth", [OAuthContoller::class, 'create'])->name("oauth");

    // social auth
    // --- Google
    Route::get('/oauth/google', [App\Http\Controllers\OAuthContoller::class, 'redirectToGoogle'])->name('oauth.google');
    Route::get('/oauth/google/callback', [App\Http\Controllers\OAuthContoller::class, 'handleGoogleCallback']);

    // --- Facebook
    Route::get('/oauth/facebook', [App\Http\Controllers\OAuthContoller::class, 'redirectToFacebook'])->name('oauth.facebook');
    Route::get('/oauth/goofacebookgle/callback', [App\Http\Controllers\OAuthContoller::class, 'handleFacebookCallback']);

    // --- Instagram
    Route::get('/oauth/instagram', [App\Http\Controllers\OAuthContoller::class, 'redirectToInstagram'])->name('oauth.instagram');
    Route::get('/oauth/instagram/callback', [App\Http\Controllers\OAuthContoller::class, 'handleInstagramCallback']);

    // --- Twitter
    Route::get('/oauth/twitter', [App\Http\Controllers\OAuthContoller::class, 'redirectToTwitter'])->name('oauth.twitter');
    Route::get('/oauth/twitter/callback', [App\Http\Controllers\OAuthContoller::class, 'handleTwitterCallback']);

    // --- Apple
    Route::get('/oauth/apple', [App\Http\Controllers\OAuthContoller::class, 'redirectToApple'])->name('oauth.apple');
    Route::get('/oauth/apple/callback', [App\Http\Controllers\OAuthContoller::class, 'handleAppleCallback']);
});