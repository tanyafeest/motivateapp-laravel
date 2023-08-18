<?php

namespace App\Actions;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class RegisterCredentials
{
    // Register and process registration
    public function __invoke($data): void
    {
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

            redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }
}
