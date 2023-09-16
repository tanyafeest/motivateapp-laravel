<?php

namespace App\Http\Controllers;

use App\Models\Sport;

class RegisterController
{
    public $sports = [];

    public function __invoke()
    {
        // check pass oauth
        if (! session()->has('temp_name') && ! session()->has('temp_email')) {
            // then redirect oauth
            return redirect('/oauth');
        }
        $this->sports = Sport::all();

        return view('auth.register', ['sports' => $this->sports]);
    }
}
