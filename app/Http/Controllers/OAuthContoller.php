<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OAuthContoller
{
    /**
     * Display the OAuth view.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $userRequestedInspire = null;

        if (session()->has('temp_inspiration_share_link')) {
            $userRequestedInspire = User::where('share_link', session('temp_inspiration_share_link'))->first();
        }

        return view('auth.oauth', compact('userRequestedInspire'));
    }
}
