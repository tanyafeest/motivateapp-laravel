<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PlayerController
{
    /**
     * Display the palyer view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort_if(! Auth::user(), 404);

        return view('player');
    }
}
