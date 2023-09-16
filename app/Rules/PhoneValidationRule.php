<?php

namespace App\Rules;

use App\Actions\Util\Twilio;
use Illuminate\Contracts\Validation\Rule;

class PhoneValidationRule implements Rule
{
    public $twilio = null;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->twilio = new Twilio();
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
        return $this->twilio->validate($value);
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
