<?php

use Illuminate\Support\Facades\Route;

Route::get("/share/{share_link}/{full_name}", [App\Http\Controllers\PublicController::class, "setupSession"])->name("public.inspiration.setupsession");

// webhook endpoint
// ---stripe
Route::post('/stripe-webhook', [App\Http\Controllers\StripeWebhookController::class, 'handleWebHook'])->name('stripe.handle.webhook');

// ---twilio
Route::get('/twilio-webhook', [App\Http\Controllers\TwilioWebhookController::class, 'receiveSMS'])->name('twilio.handle.webhook');