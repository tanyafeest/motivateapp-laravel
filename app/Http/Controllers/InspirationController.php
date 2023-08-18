<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspirationController
{
    public function __invoke()
    {
        return view("onboarding");
    }
}
