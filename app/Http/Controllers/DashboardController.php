<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;

class DashboardController extends Controller
{
    public function index()
    {
        if(session()->has("temp_inspiration_share_link")) {
            return redirect()->intended(RouteServiceProvider::ONBOARDING);
        }

        return view("dashboard");
    }
}
