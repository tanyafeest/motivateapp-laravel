<?php

use Illuminate\Support\Facades\Route;

Route::get("/share/{share_link}/{full_name}", [App\Http\Controllers\PublicController::class, "setupSession"])->name("public.inspiration.setupsession");