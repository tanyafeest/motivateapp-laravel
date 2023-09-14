<?php

namespace App\Actions\Util;

use Twilio\Rest\Client;
use Exception;

class Twilio {
    public $client = null;

    public function __construct()
    {
        $this->client = new Client(config('twilio.api_key'), config('twilio.api_secret'), config('twilio.account_sid'));
    }

    /**
     * send message to the user
     *
     * @param  String $from, $to, $body
     * @return Object
    */
    public function sendSMS($body, $from, $to)
    {
        try {
            $message = $this->client->messages->create($to, [
                'body' => $body,
                'from' => $from
            ]);
            return $message->sid;
        } catch (Exception) {
            return new \stdClass();
        }
    }

    /**
     * validate phone number
     *
     * @param  String $phone
     * @return Boolean $result
    */
    public function validate($phone)
    {
        try {
            $res = $this->client->lookups->v1->phoneNumbers($phone)->fetch();

            return true;
        } catch (Exception) {
            // if($e->getCode() == 404) {
            //     return false;
            // }
            return false;
        }
    }
}