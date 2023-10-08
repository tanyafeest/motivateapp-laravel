<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentSubScriptionController
{
    //

    public function __invoke(Request $request)
    {
        $user = Auth::user();

        abort_if(! $user, 403);
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);

        try {
            $user->newSubscription(config('services.stripe.subscription_plan'), config('services.stripe.subscription_plan_id'))->create($paymentMethod);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. '.$e->getMessage()]);
        }

        return redirect()->intended(RouteServiceProvider::UPGRADE)->send();
    }
}
