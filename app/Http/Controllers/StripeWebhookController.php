<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Symfony\Component\HttpFoundation\Response;

class StripeWebhookController extends CashierController
{
    /**
     * Handle customer created
     */
    public function handleCustomerCreated(array $payload): void
    {

    }

    /**
     * Handle customer created
     *  This function only require return value of Symfony\Component\HttpFoundation\Response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleCustomerSubscriptionCreated(array $payload)
    {
        return new Response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * Handle customer created
     *  This function only require return value of Symfony\Component\HttpFoundation\Response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handleCustomerSubscriptionDeleted(array $payload)
    {
        return new Response('', Response::HTTP_NO_CONTENT);
    }

    public function handleInvoicePaymentFailed(array $payload): void
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(! Auth::user(), 404);

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

        if (method_exists($this, $method)) {
            $this->{$method}($payload);

            WebhookHandled::dispatch($payload);
        }

        return $this->missingMethod($payload);
    }
}
