<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TwilioWebhookController
{
    public function receiveSMS(Request $request)
    {
        $message = $request->input('Body');
        $phone = $request->input('From');

        $user = User::firstWhere('phone', $phone);

        if ($user) {
            if (str_contains(strtolower((string) $message), 'y')) {
                // if the message contains y or Y, we need to set the user's sms_frequency as default(1 - weekly monday night)
                /** @phpstan-ignore-next-line */
                $user->setting->sms_frequency = 1;
                $user->save();
            } elseif (str_contains(strtolower((string) $message), 'un') || str_contains(strtolower((string) $message), 'no')) {
                // if the message contains no, un, NO, UN, No, Un, unsubscribe, UNSUBSCRIBE etc, set the user's frequency as never(18)
                /** @phpstan-ignore-next-line */
                $user->setting->sms_frequency = 18;
                $user->save();
            }
        }

        error_log('Just received "'.$message.'" from "'.$phone.'"');
    }
}
