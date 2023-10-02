<?php

namespace App\Http\Controllers;

class TestSubScribedController
{
    public function __invoke()
    {
        return view('welcome');
    }
}
