<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TwilioWebhookController extends Controller
{
    /**
     * receive an incoming SMS message
     *
     * @param  Request  $request
     * @return Response
    */
    public function receiveSMS(Request $request)
    {
        $message = $request->input('Body');
        $phone = $request->input('From');

        $user = User::firstWhere('phone', $phone);

        if($user) {
            if(str_contains(strtolower($message), 'y')) {
                // if the message contains y or Y, we need to set the user's sms_frequency as default(1 - weekly monday night)
                $user->setting->sms_frequency = 1;
                $user->save();
            } else if(str_contains(strtolower($message), 'un') || str_contains(strtolower($message), 'no')) {
                // if the message contains no, un, NO, UN, No, Un, unsubscribe, UNSUBSCRIBE etc, set the user's frequency as never(18)
                $user->setting->sms_frequency = 18;
                $user->save();
            }
        }

        error_log('Just received "' . $message . '" from "' . $phone . '"');
    }
}
