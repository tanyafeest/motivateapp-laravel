<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SpotifyRedirectController
{
    /**
     * Handle the incoming request.
     *
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function __invoke($redirect_url)
    {
        session()->flash('temp_redirect_url', $redirect_url);

        /** @phpstan-ignore-next-line */
        return Socialite::driver('spotify')->scopes(['user-top-read', 'playlist-modify-public', 'playlist-modify-private'])->redirect();
    }
}
