<?php

namespace App\Http\Controllers;

use App\Actions\Auth\RedirectBackWithSpotifyData;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SpotifyCallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        try {

            $user = Socialite::driver('spotify')->user();

            return (new RedirectBackWithSpotifyData())($user);

        } catch (Exception) {

            return redirect()->intended(RouteServiceProvider::HOME)->send();

        }
    }
}
