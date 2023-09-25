<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpgradeFormController
{
    public function __invoke(){
        abort_if(!Auth::user(), 404);
        return view('upgrade-form');
    }
}
