<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // check pass oauth
        if(!session()->has("temp_name") && !session()->has("temp_email")) {
            // then redirect oauth
            return redirect("/oauth");
        }
        
        return view('auth.register');
    }
}
