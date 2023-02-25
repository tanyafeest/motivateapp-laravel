<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class PublicController extends Controller
{
    // Got the link from SMS to this app, then start inspiring onboarding.
    // setup session for the onboarding
    public function setupSession($share_link, $fullname = null)
    {
        session(["temp_inspiration_share_link" => $share_link]);
        session(["temp_inspiration_full_name" => $fullname]);

        return redirect()->intended(RouteServiceProvider::REGISTER);
    }
}
