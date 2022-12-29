<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Twilio\Rest\Client;
use Exception;

class PhoneValidationRule implements Rule
{
    public $client = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client(config('twilio.api_key'), config('twilio.api_secret'), config('twilio.account_sid'));
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $phone = $this->client->lookups->v1->phoneNumbers($value)->fetch();

            return true;
        } catch (Exception $e) {
            if($e->getCode() == 404) {
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number is invalid.';
    }
}
