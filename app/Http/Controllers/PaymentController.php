<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PaymentController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
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
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(!Auth::user(), 404);

        $user = Auth::user();

        $intent = $user->createSetupIntent();

        return view('payment', compact('user', 'intent'));
    }

    /**
     * Process the payment
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscription(Request $request)
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(!Auth::user(), 404);

        $user = Auth::user();

        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);

        try {
            $user->newSubscription(env('STRIPE_SUBSCRIPTION_PLAN'), env('STRIPE_SUBSCRIPTION_PLAN_ID'))->create($paymentMethod);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect()->intended(RouteServiceProvider::UPGRADE)->send();
    }

    /**
     * Cancel the subscription
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function cancel()
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(!Auth::user(), 404);

        $user = Auth::user();

        try {
            $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->cancel();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->intended(RouteServiceProvider::HOME)->send();
    }

    /**
     * Resume the subscription
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function resume()
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(!Auth::user(), 404);
        
        $user = Auth::user();

        if($user->isOnGracePeriod()) {
            try {
                $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->resume();
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        return redirect()->intended(RouteServiceProvider::HOME)->send();
    }
}
