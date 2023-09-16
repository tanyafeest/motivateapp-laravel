<?php

use App\Http\Livewire\Onboarding;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Onboarding::class);
// Route::get('/', function(){
//     return view('test');
//});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/test', function () {
    return view('test');
});

require __DIR__.'/auth.php';
require __DIR__.'/app.php';
require __DIR__.'/public.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/inspiration', function () {
        return view('inspiration');
    })->name('inspiration');
    Route::get('/inspiration-playlist', function () {
        return view('inspiration-playlist');
    })->name('playlist');
    Route::get('/inspiration-past', function () {
        return view('inspiration-past');
    })->name('motivation');

    Route::get('/upgrade-plan', function () {
        return view('upgrade-plan');
    })->name('upgrade-plan');

    Route::get('/upgrade-form', function () {
        return view('upgrade-form');
    })->name('upgrade-form');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/player', function () {
        return view('player');
    })->name('player');
});
