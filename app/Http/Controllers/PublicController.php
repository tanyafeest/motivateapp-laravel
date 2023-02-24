<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PublicController
{
    public function __invoke($share_link, $fullname = null)
    {
        session(["temp_inspiration_share_link" => $share_link]);
        session(["temp_inspiration_full_name" => $fullname]);

        return redirect()->intended(RouteServiceProvider::REGISTER);
    }
}
