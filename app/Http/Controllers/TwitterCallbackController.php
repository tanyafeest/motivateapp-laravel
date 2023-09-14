<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Actions\RegisterCredentials;
use Exception;

class TwitterCallbackController
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $data = Socialite::driver('twitter-oauth-2')->user();

            $result = (new RegisterCredentials())($data);

            return $result;
        } catch (Exception) {
            abort_if(!Auth::user(), 404);
            return redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }
}
