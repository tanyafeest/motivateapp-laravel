<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Events\WebhookHandled;
use Illuminate\Support\Facades\Mail;
use App\Mail\UpgradeConfirmation;
use Illuminate\Support\Carbon;
use App\Models\User;
use Exception;

class StripeWebhookController extends CashierController
{
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

    }

    /**
     * Handle customer subscription updated.(Send mail to the user)
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        try {
            $email = "albertlee44917@gmail.com";
            $user = User::firstWhere('email', $email);
            
            $upgradeConfirmationData = new \stdClass();
                
            $upgradeConfirmationData->email = $email;
            $upgradeConfirmationData->oauthType = $user->oauth_type;
            $upgradeConfirmationData->charged_at = Carbon::now()->format('m/d/y');
            $upgradeConfirmationData->renew_at = Carbon::now()->addYear()->format('m/d/y');

            Mail::to($user)->send(new UpgradeConfirmation($upgradeConfirmationData));
        } catch (Exception $e) {
            error_log($e);
        }
    }

    /**
     * Handle invoice paid
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleInvoicePaid(array $payload)
    {
        error_log(json_encode($payload));
        // send mail(upgrade confirmation)
        $email = $payload['data']['object']['customer_email'];
        $user = User::firstWhere('email', $email);

        if($user) {
            error_log($user);
            $upgradeConfirmationData = new \stdClass();
            
            $upgradeConfirmationData->email = $email;
            $upgradeConfirmationData->oauthType = $user->oauth_type;
            $upgradeConfirmationData->charged_at = Carbon::now()->format('m/d/y');
            $upgradeConfirmationData->renew_at = Carbon::now()->addYear()->format('m/d/y');

            Mail::to($user)->send(new UpgradeConfirmation($upgradeConfirmationData));
            error_log("sdf");
        }
    }

    /**
     * Handle invoice payment failed
     *
     * @param  array  $payload
     * @return void
     */


    public function handleWebHook(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        $method = 'handle'.Str::studly(str_replace('.', '_', $payload['type']));

        error_log($method);

        WebhookReceived::dispatch($payload);

        if(method_exists($this, $method)) {
            $this->{$method}($payload);

            WebhookHandled::dispatch($payload);
        }

        return $this->missingMethod($payload);
    }
}
