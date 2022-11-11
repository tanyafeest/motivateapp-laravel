<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspirationController extends Controller
{
    public function onboarding()
    {
        return view("onboarding");
    }
}
