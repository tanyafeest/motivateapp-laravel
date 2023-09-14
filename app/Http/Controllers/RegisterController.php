<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\User;

class RegisterController
{
    public $sports = [];
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        // check pass oauth
        if (!session()->has("temp_name") && !session()->has("temp_email")) {
            // then redirect oauth
            $userRequestedInspire = null;

            if (session()->has("temp_inspiration_share_link")) {
                $userRequestedInspire = User::where('share_link', session('temp_inspiration_share_link'))->first();
            }
            return view('auth.oauth', compact('userRequestedInspire'));
        }

        $this->sports = Sport::all();
        return view('auth.register', ['sports' => $this->sports]);
    }
}
