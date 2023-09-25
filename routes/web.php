<?php

use Illuminate\Support\Facades\Route;


// Include Controllers
use App\Http\Livewire\Onboarding;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InspirationController;
use App\Http\Controllers\InspirationPlayListController;
use App\Http\Controllers\InspirationPastController;
use App\Http\Controllers\UpgradePlanController;
use App\Http\Controllers\UpgradeFormController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\TestController;


use App\Http\Livewire\Dashboard;

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

require __DIR__.'/auth.php';
require __DIR__.'/app.php';
require __DIR__.'/public.php';

Route::get('/', Onboarding::class);

Route::get('/success', SuccessController::class);

Route::get('/test', TestController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',])->group(function () {

    Route::get('/dashboard', Dashboard::class);

    Route::get('/inspiration', InspirationController::class)->name('inspiration');

    Route::get('/inspiration-playlist', InspirationPlayListController::class)->name('playlist');

    Route::get('/inspiration-past', InspirationPastController::class)->name('motivation');

    Route::get('/upgrade-plan', UpgradePlanController::class)->name('upgrade-plan');

    Route::get('/upgrade-form', UpgradeFormController::class)->name('upgrade-form');

    Route::get('/settings', SettingsController::class)->name('settings');

    Route::get('/player', PlayerController::class)->name('player');
});
