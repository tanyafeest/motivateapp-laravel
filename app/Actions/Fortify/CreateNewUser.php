<?php

namespace App\Actions\Fortify;

use App\Actions\Util\CalculateGradYear;
use App\Actions\Util\IpBase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $calculateGradeYear = new CalculateGradYear();
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'gender' => ['required', 'string'],
            'age' => ['required', 'integer', 'max:200'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $client = new IpBase();
        $response = $client->info($input['ip_address']);

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'name' => $input['first_name'].' '.$input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'gender' => $input['gender'],
            'age' => $input['age'],
            'zip_codezip_code' => $response['location']['zip'],
            'ip_address' => $input['ip_address'],
            'country' => $response['location']['country']['alpha3'],
            'grade_year' => isset($input['current_grade']) ? $calculateGradeYear->calc($input['current_grade']) : null,
            'sport_id' => $input['sport'] ?? null,
            'profile_photo_path' => session('temp_avatar') ? session('temp_avatar') : null,
            'password' => Hash::make($input['password']),
            'share_link' => uniqid(),
        ]);
    }
}
