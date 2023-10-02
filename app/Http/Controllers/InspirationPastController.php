<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InspirationPastController
{
    public function __invoke()
    {
        abort_if(! Auth::user(), 404);

        return view('inspiration-past');
    }
}
