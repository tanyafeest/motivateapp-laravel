<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

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
        abort_if(! Auth::user(), 404);

        return view('upgrade');
    }
}
