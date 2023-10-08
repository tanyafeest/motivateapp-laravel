<?php

namespace App\Http\Controllers;

use App\Actions\Auth\RedirectRegisterWithCredentialOrLogin;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class TwitterCallbackController
{
    /**
     * Handle the incoming request.
     *
     *@return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {

            $user = Socialite::driver('twitter-oauth-2')->user();

            return (new RedirectRegisterWithCredentialOrLogin())($user);

        } catch (Exception) {

            return redirect()->intended(RouteServiceProvider::HOME)->send();

        }
    }
}
