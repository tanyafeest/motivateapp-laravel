<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SpotifyRedirectController
{
    /**
     * Handle the incoming request.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        return Socialite::driver('spotify')->redirect();
    }
}
