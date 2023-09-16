<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class TwilioWebhookController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * receive an incoming SMS message
     *
     * @return void
     */
    public function receiveSMS(Request $request)
    {
        $message = $request->input('Body');
        $phone = $request->input('From');

        $user = User::firstWhere('phone', $phone);

        if ($user) {
            if (str_contains(strtolower((string) $message), 'y')) {
                // if the message contains y or Y, we need to set the user's sms_frequency as default(1 - weekly monday night)
                $user->setting()->sms_frequency = 1;
                $user->save();
            } elseif (str_contains(strtolower((string) $message), 'un') || str_contains(strtolower((string) $message), 'no')) {
                // if the message contains no, un, NO, UN, No, Un, unsubscribe, UNSUBSCRIBE etc, set the user's frequency as never(18)
                $user->setting()->sms_frequency = 18;
                $user->save();
            }
        }

        error_log('Just received "'.$message.'" from "'.$phone.'"');
    }
}
