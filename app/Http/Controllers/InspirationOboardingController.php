<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InspirationOboardingController
{
    public function __invoke()
    {
        abort_if(! Auth::user(), 404);

        return view('onboarding');
    }
}
