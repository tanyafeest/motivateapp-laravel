<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SpotifyCallbackController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $user = Socialite::driver('spotify')->user();

            session(['temp_spotify_id' => $user->id]);
            session(['temp_spotify_access_token' => $user->token]);

            return redirect()->intended(RouteServiceProvider::HOME)->send();
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }
}
