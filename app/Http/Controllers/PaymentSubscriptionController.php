<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentSubscriptionController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //
    /**
     * Process the payment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(! Auth::user(), 404);

        $user = Auth::user();

        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);

        try {
            $user->newSubscription(env('STRIPE_SUBSCRIPTION_PLAN'), env('STRIPE_SUBSCRIPTION_PLAN_ID'))->create($paymentMethod);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. '.$e->getMessage()]);
        }

        return redirect()->intended(RouteServiceProvider::UPGRADE)->send();
    }
}
