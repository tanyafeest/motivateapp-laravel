<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use CountryState;

class PaymentController extends Controller
{
    /**
     * Display the payment upgrade view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('upgrade');
    }

    /**
     * Display the charge view
     * 
     * @return \Illuminate\View\View
     */
    public function payment()
    {
        $user = Auth::user();
        $countries = CountryState::getCountries();

        $intent = $user->createSetupIntent();

        return view('payment', compact('user', 'intent', 'countries'));
    }

    /**
     * Process the payment
     * 
     * @return \Illuminate\View\View
     */
    public function subscription(Request $request)
    {
        $user = Auth::user();

        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);

        try {
            $user->newSubscription(config('services.stripe.subscription_plan'), config('services.stripe.subscription_plan_id'))->create($paymentMethod);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect()->intended(RouteServiceProvider::UPGRADE)->send();
    }

    /**
     * Cancel the subscription
     * 
     * @return \Illuminate\View\View
     */
    public static function cancel()
    {
        $user = Auth::user();

        try {
            $user->subscription(config('services.stripe.subscription_plan'))->cancel();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Resume the subscription
     * 
     * @return \Illuminate\View\View
     */
    public static function resume()
    {
        $user = Auth::user();

        if($user->isOnGracePeriod()) {
            try {
                $user->subscription(config('services.stripe.subscription_plan'))->resume();
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
