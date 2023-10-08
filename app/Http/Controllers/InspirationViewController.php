<?php

namespace App\Http\Controllers;

use App\Models\Inspiration;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class InspirationViewController
{
    //

    public function __invoke($id)
    {

        abort_if(! Auth::user(), 404);

        // check the inspiration is exist or not by id
        $inspiration = Inspiration::find($id);
        if (! $inspiration) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // check owner of this inspiration
        if (Auth::user()->id != $inspiration->user_id) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return view('inspiration-card', compact('id'));
    }
}
