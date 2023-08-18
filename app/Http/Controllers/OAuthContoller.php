<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OAuthContoller
{
    /**
     * Display the OAuth view.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $user_requested_inspire = null;

        if (session()->has("temp_inspiration_share_link")) {
            $user_requested_inspire = User::where('share_link', session('temp_inspiration_share_link'))->get()->first();
        }

        return view('auth.oauth', compact('user_requested_inspire'));
    }
}
