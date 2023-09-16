<?php

namespace App\Http\Controllers;

class PlayerController
{
    /**
     * Display the palyer view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('player');
    }
}
