<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class InstagramCallbackController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = Socialite::driver('instagram')->user();

        $user = User::where('email', $data->email)->first();

        if (!$user) {
            session(["temp_first_name" => $data->user["given_name"]]);
            session(["temp_last_name" => $data->user["family_name"]]);
            session(["temp_email" => $data->email]);
            session(["temp_avatar" => $data->avatar]);

            redirect()->intended(RouteServiceProvider::REGISTER)->send();
        } else {
            session()->forget("temp_first_name");
            session()->forget("temp_last_name");
            session()->forget("temp_email");
            session()->forget("temp_avatar");

            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }
}
