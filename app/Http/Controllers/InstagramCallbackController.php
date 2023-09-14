<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use App\Actions\RegisterCredentials;
use Exception;

class InstagramCallbackController
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $data = Socialite::driver('instagram')->user();

            $result = (new RegisterCredentials())($data);

            return $result;
        } catch (Exception) {
            abort_if(!Auth::user(), 404);
            return redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }
}
