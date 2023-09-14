<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Events\WebhookHandled;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class StripeWebhookController extends CashierController
{
    /**
     * Handle customer created
     *
     * @param  array  $payload
     * @return void
     */
    // public function handleCustomerCreated(array $payload)
    // {
    // }
    /**
     * Handle customer subscription created
     *
     * @param  array  $payload
     * @return void
     */
    // public function handleCustomerSubscriptionCreated(array $payload)
    // {
    // }
    /**
     * Handle customer subscription deleted
     *
     * @param  array  $payload
     * @return void
     */
    // public function handleCustomerSubscriptionDeleted(array $payload)
    // {
    // }
    /**
     * Handle invoice payment failed
     *
     * @return void
     */
    public function handleInvoicePaymentFailed(array $payload)
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(!Auth::user(), 404);
        
        // downgrade user
        // $customer = $payload['customer'];
        $customer = 'cus_MqFFWawhu6Iknw';

        $user = User::where('stripe_id', '=', $customer)->first();

        $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->cancelNow();
    }

    /**
     * Handle invoice payment succeeded.
     *
     * @return void
     */
    protected function handleInvoicePaymentSucceeded(array $payload)
    {
        error_log(json_encode($payload, JSON_THROW_ON_ERROR));
    }

    /**
     * Handle customer subscription updated.(Send mail to the user)
     *
     * @param  array  $payload
     * @return \Illuminate\Http\RedirectResponse.
     */
    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        error_log(json_encode($payload, JSON_THROW_ON_ERROR));
        return redirect()->intended(RouteServiceProvider::HOME)->send();
    }

    public function handleWebHook(Request $request)
    {
        $payload = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $method = 'handle'.Str::studly(str_replace('.', '_', (string) $payload['type']));

        WebhookReceived::dispatch($payload);

        if(method_exists($this, $method)) {
            $this->{$method}($payload);

            WebhookHandled::dispatch($payload);
        }

        return $this->missingMethod($payload);
    }
}
