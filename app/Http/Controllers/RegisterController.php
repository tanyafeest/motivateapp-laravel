<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class RegisterController extends Controller
{
    public $sports = [];
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
        
        $this->sports = Sport::all();
        return view('auth.register', ['sports' => $this->sports]);
    }
}
