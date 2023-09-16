<?php

namespace App\Actions\Util;

use Exception;
use Twilio\Rest\Client;

class Twilio
{
    public $client = null;

    public function __construct()
    {
        $this->client = new Client(config('twilio.api_key'), config('twilio.api_secret'), config('twilio.account_sid'));
    }

    /**
     * send message to the user
     *
     * @param  string  $from, $to, $body
     * @return object
     */
    public function sendSMS($body, $from, $to)
    {
        try {
            $message = $this->client->messages->create($to, [
                'body' => $body,
                'from' => $from,
            ]);

            return $message->sid;
        } catch (Exception) {
            return new \stdClass();
        }
    }

    /**
     * validate phone number
     *
     * @param  string  $phone
     * @return bool $result
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
