<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OauthController
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $requestUser = null;

        if (session()->has('temp_inspiration_share_link')) {
            $requestUser = User::firstWhere('share_link', session('temp_inspiration_share_link'));
        }

        return view('registration', compact('requestUser'));
    }
}
