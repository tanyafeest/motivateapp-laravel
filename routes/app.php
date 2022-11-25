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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/inspiration', function () {
        return view('inspiration');
    })->name('inspiration');
    Route::get('/upgrade', function () {
        return view('upgrade');
    })->name('upgrade');
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});