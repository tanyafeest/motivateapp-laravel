<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('auth.login');
    }
}
