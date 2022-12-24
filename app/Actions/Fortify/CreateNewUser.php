<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Actions\Util\CalculateGradYear;
use App\Models\User;
use App\Models\Setting;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $calculateGradeYear = new CalculateGradYear();
        
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/i'],
            'gender' => ['required', 'integer'],
            'age' => ['required', 'integer', 'max:200'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = new User;

        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->name = $input['first_name'] . " " . $input['last_name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->gender = $input['gender'];
        $user->age = $input['age'];
        $user->grade_year = isset($input['current_grade']) ? $calculateGradeYear->calc($input['current_grade']) : null;
        $user->sport_id = isset($input['sport']) ? $input['sport'] : null;
        $user->password = Hash::make($input['password']);
        $user->share_link = uniqid();

        $user->save();

        $setting = new Setting;

        $setting->user_id = $user->id;
        
        $setting->save();

        return $user;
    }
}
