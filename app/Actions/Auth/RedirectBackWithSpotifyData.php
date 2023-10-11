<?php

namespace App\Actions\Auth;

use Exception;

class RedirectBackWithSpotifyData
{
    public $user;

    public function __invoke($user)
    {
        $this->user = $user;
        try {
            session(['temp_spotify_id' => $this->user->id]);
            session(['temp_spotify_access_token' => $this->user->token]);
            session(['temp_spotify_refresh_token' => $this->user->refreshToken]);

            return redirect()->intended(route(session('temp_redirect_url')))->send();
        } catch (Exception $e) {
            if ($e->getCode() == 403) {
                session(['temp_spotify_status' => 'USER_NOT_REGISTERED']);
            }

            return redirect()->intended(route(session('temp_redirect_url')))->send();
        }
    }
}
