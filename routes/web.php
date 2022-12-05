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

Route::get('/on', Onboarding::class);


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/registration', function () {
    return view('registration');
});

// Route::get('/test', function () {
//     return view('test');
// });

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
