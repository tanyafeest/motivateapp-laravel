<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class PaymentResumeController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    //
    /**
     * Process the payment
     *
     * @return void
     */
    public function __invoke()
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(! Auth::user(), 404);

        $user = Auth::user();

        try {
            $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->resume();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
