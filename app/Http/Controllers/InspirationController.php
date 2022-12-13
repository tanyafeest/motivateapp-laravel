<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspirationController extends Controller
{
    /**
     * Display the inspiration view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('inspiration');
    }

    /**
     * Display the onboarding view.
     *
     * @return \Illuminate\View\View
     */
    public function onboarding()
    {
        return view("onboarding");
    }
}
