<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class RegisterController
{
    public function __invoke(Request $request)
    {
        // check pass oauth
        if (! session()->has('temp_name') && ! session()->has('temp_email')) {
            // then redirect oauth
            return redirect(RouteServiceProvider::OAUTH);
        }

        $sports = config('sports');

        return view('auth.register', compact('sports'));
    }
}
