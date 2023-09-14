<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
