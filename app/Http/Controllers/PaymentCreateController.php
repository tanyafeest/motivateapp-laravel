<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PaymentCreateController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

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
