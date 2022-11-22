<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Events\WebhookHandled;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StripeWebhookController extends CashierController
{
    /**
     * Handle customer created
     *
     * @param  array  $payload
     * @return void
     */
    public function handleCustomerCreated(array $payload)
    {

    }

    /**
     * Handle customer subscription created
     *
     * @param  array  $payload
     * @return void
     */
    public function handleCustomerSubscriptionCreated(array $payload)
    {

    }

    /**
     * Handle customer subscription deleted
     *
     * @param  array  $payload
     * @return void
     */
    public function handleCustomerSubscriptionDeleted(array $payload)
    {

    }

    /**
     * Handle invoice payment failed
     *
     * @param  array  $payload
     * @return void
     */
    public function handleInvoicePaymentFailed(array $payload)
    {
        // downgrade user
        // $customer = $payload['customer'];
        $customer = 'cus_MqFFWawhu6Iknw';

        $user = User::where('stripe_id', '=', $customer)->first();

        $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->cancelNow();
    }

    /**
     * Handle invoice payment succeeded.
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleInvoicePaymentSucceeded(array $payload)
    {
        error_log(json_encode($payload));
    }

    /**
     * Handle customer subscription updated.(Send mail to the user)
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        error_log(json_encode($payload));
    }

    public function handleWebHook(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        $method = 'handle'.Str::studly(str_replace('.', '_', $payload['type']));

        WebhookReceived::dispatch($payload);

        if(method_exists($this, $method)) {
            $this->{$method}($payload);

            WebhookHandled::dispatch($payload);
        }

        return $this->missingMethod($payload);
    }
}
