<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PaymentSubScriptionCancelController
{
    //

    public function __invoke()
    {
        abort_if(! Auth::user(), 403);

        try {
            Auth::user()->subscription(config('services.stripe.subscription_plan'))->cancel();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
