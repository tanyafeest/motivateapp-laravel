<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
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
