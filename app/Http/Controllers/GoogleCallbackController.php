<?php

namespace App\Http\Controllers;

use App\Actions\Auth\RedirectRegisterWithCredentialOrLogin;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleCallbackController
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            session(['temp_social_app' => 'google']);

            $user = Socialite::driver('google')->user();

            return (new RedirectRegisterWithCredentialOrLogin())($user);

        } catch (Exception) {

            return redirect()->intended(RouteServiceProvider::HOME)->send();

        }
    }
}
