<?php

namespace App\Http\Controllers;

use App\Mail\UpgradeConfirmation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Cashier\Events\WebhookHandled;
use Laravel\Cashier\Events\WebhookReceived;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class StripeWebhookController extends CashierController
{
    public function handleCustomerSubscriptionDeleted(array $payload)
    {
        return response(null, 204);
    }

    public function handleInvoicePaymentFailed(array $payload)
    {
        // downgrade user
        $email = $payload['data']['object']['customer_email'];
        $user = User::firstWhere('email', $email);

        if ($user) {
            $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->cancelNow();
        }
    }

    protected function handleInvoicePaymentSucceeded(array $payload)
    {

    }

    protected function handleCustomerSubscriptionUpdated(array $payload)
    {
        return response(null, 204);
    }

    /**
     * Handle invoice paid
     *
     * @return void
     */
    protected function handleInvoicePaid(array $payload)
    {
        // send mail(upgrade confirmation)
        $email = $payload['data']['object']['customer_email'];
        $user = User::firstWhere('email', $email);

        if ($user) {
            $upgradeConfirmationData = new \stdClass();

            $upgradeConfirmationData->email = $email;
            $upgradeConfirmationData->oauthType = $user->oauth_type;
            $upgradeConfirmationData->charged_at = Carbon::now()->format('m/d/y');
            $upgradeConfirmationData->renew_at = Carbon::now()->addYear()->format('m/d/y');

            Mail::to($user)->send(new UpgradeConfirmation($upgradeConfirmationData));
        }
    }

    public function handleWebHook(Request $request)
    {
        $payload = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        $method = 'handle'.Str::studly(str_replace('.', '_', (string) $payload['type']));

        error_log($method);

        WebhookReceived::dispatch($payload);

        if (method_exists($this, $method)) {
            $this->{$method}($payload);

            WebhookHandled::dispatch($payload);
        }

        return $this->missingMethod($payload);
    }
}
