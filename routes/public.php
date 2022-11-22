<?php

use Illuminate\Support\Facades\Route;

Route::get("/share/{share_link}/{full_name}", [App\Http\Controllers\PublicController::class, "setupSession"])->name("public.inspiration.setupsession");

// webhook endpoint
Route::post('/stripe-webhook', [App\Http\Controllers\StripeWebhookController::class, 'handleWebHook'])->name('stripe.handle.webhook');