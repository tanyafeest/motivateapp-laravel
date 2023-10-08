<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        return view('auth.login');
    }
}
