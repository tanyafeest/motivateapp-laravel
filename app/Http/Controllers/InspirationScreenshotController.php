<?php

namespace App\Http\Controllers;

use App\Models\Inspiration;
use Illuminate\Support\Facades\Auth;

class InspirationScreenshotController
{
    public function __invoke($id)
    {
        abort_if(! Auth::user(), 404);

        $inspiration = Inspiration::find($id);

        return view('screenshot', compact('inspiration'));
    }
}
