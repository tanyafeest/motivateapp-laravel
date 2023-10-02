<?php

namespace App\Http\Controllers;

class SuccessController
{
    public function __invoke()
    {
        return view('success');
    }
}
