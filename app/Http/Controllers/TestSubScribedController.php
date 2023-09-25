<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestSubScribedController
{
    public function __invoke(){
        return view('welcome');
    }
}
