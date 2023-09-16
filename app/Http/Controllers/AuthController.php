<?php

namespace App\Http\Controllers;

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
