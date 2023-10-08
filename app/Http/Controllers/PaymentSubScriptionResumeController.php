<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PaymentSubScriptionResumeController
{
    //

    public function __invoke()
    {
        abort_if(! Auth::user(), 403);

        $user = Auth::user();
        if ($user->isOnGracePeriod()) {
            try {
                Auth::user()->subscription(config('services.stripe.subscription_plan'))->resume();
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
