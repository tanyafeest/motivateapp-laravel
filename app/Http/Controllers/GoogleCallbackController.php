<?php

namespace App\Http\Controllers;

use App\Actions\RegisterCredentials;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleCallbackController
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
            $data = Socialite::driver('google')->user();

            $result = (new RegisterCredentials())($data);

            return $result;
        } catch (Exception $e) {
            abort_if(!Auth::user(), 404);
        }
    }
}
