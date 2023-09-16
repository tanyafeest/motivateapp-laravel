<?php

namespace App\Http\Controllers;

use App\Actions\RegisterCredentials;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AppleCallbackController
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $data = Socialite::driver('apple')->user();

            $result = (new RegisterCredentials())($data);

            return $result;
        } catch (Exception) {
            abort_if(! Auth::user(), 404);

            return redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }
}
