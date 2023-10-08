<?php

namespace App\Http\Controllers;

use App\Models\Inspiration;

class InspirationController
{
    /**
     * Display the inspiration view.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('inspiration');
    }
}
