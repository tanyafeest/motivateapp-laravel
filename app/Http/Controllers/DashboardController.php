<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function __invoke(Request $request)
    {
        abort_if(! Auth::user(), 404);

        return view('dashboard');
    }
}
