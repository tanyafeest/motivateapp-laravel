<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PaymentCreateController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //
    /**
     * Display the payment upgrade view.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('upgrade');
    }
}
