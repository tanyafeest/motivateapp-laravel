<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OnboardingController
{
    //

    public function __invoke()
    {
        abort_if(! Auth::user(), 404);

        return view('onboarding');
    }
}
