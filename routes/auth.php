<?php

use App\Http\Controllers\AppleCallbackController;
use App\Http\Controllers\AppleRedirectController;
use App\Http\Controllers\OAuthContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FacebookCallbackController;
use App\Http\Controllers\FacebookRedirectController;
use App\Http\Controllers\GoogleCallbackController;
use App\Http\Controllers\GoogleRedirectController;
use App\Http\Controllers\InstagramCallbackController;
use App\Http\Controllers\InstagramRedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TwitterCallbackController;
use App\Http\Controllers\TwitterRedirectController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/login", AuthController::class)->name("login");

    Route::get("/register", RegisterController::class)->name("register");

    Route::get("/oauth", OAuthContoller::class)->name("oauth");

    // social auth
    // --- Google
    Route::get('/oauth/google', GoogleRedirectController::class)->name('oauth.google');
    Route::get('/oauth/google/callback', GoogleCallbackController::class);

    // --- Facebook
    Route::get('/oauth/facebook', FacebookRedirectController::class)->name('oauth.facebook');
    Route::get('/oauth/goofacebookgle/callback', FacebookCallbackController::class);

    // --- Instagram
    Route::get('/oauth/instagram', InstagramRedirectController::class)->name('oauth.instagram');
    Route::get('/oauth/instagram/callback', InstagramCallbackController::class);

    // --- Twitter
    Route::get('/oauth/twitter', TwitterRedirectController::class)->name('oauth.twitter');
    Route::get('/oauth/twitter/callback', TwitterCallbackController::class);

    // --- Apple
    Route::get('/oauth/apple', AppleRedirectController::class)->name('oauth.apple');
    Route::get('/oauth/apple/callback', AppleCallbackController::class);
});
