<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Auth;

class RedirectRegisterWithCredentialOrLogin
{
    public function __invoke($data): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = User::where('email', $data->getEmail())->first();

            if (! $user) {
                session(['temp_first_name' => $data->user['given_name']]);
                session(['temp_last_name' => $data->user['family_name']]);
                session(['temp_email' => $data->getEmail()]);
                session(['temp_avatar' => $data->getAvatar()]);

                return redirect()->intended(RouteServiceProvider::REGISTER)->send();
            } else {
                session()->forget('temp_first_name');
                session()->forget('temp_last_name');
                session()->forget('temp_email');
                session()->forget('temp_avatar');

                Auth::login($user);

                return redirect()->intended(RouteServiceProvider::HOME)->send();
            }
        } catch (Exception) {
            abort_if(! Auth::user(), 404);

            return redirect()->intended(RouteServiceProvider::HOME)->send();
        }
    }
}
