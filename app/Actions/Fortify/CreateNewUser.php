<?php

namespace App\Actions\Fortify;

use App\Actions\Util\CalculateGradYear;
use App\Actions\Util\IpBase;
use App\Mail\Welcome;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Request;
use Revolution\Google\Sheets\Facades\Sheets;

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
        $ipBase = new IpBase();
        $calculateGradeYear = new CalculateGradYear();

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'gender' => ['required', 'integer'],
            'age' => ['required', 'integer', 'max:200'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        //Create new user
        $user = new User;
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->name = $input['first_name'].' '.$input['last_name'];
        $user->email = $input['email'];
        $user->phone = str_replace(' ', '', (string) $input['phone']);
        $user->gender = $input['gender'];
        $user->age = $input['age'];
        $user->grade_year = isset($input['current_grade']) ? $calculateGradeYear->calc($input['current_grade']) : null;
        $user->sport_id = $input['sport'] ?? null;
        $user->password = Hash::make($input['password']);
        $user->share_link = uniqid();
        $user->oauth_type = session('temp_social_app');
        $user->profile_photo_path = session('temp_avatar');
        $user->save();

        // Create setting record.
        $setting = new Setting;
        $setting->user_id = $user->id;
        $setting->save();

        // save user data on account sheet
        // TODO: twitter, facebook, instagram public profile url check
        $ipInfo = $ipBase->info(Request::ip());

        $append = [
            Carbon::now()->format('m/d/y'),
            $user->oauth_type,
            session('temp_id'),
            $user->name,
            $user->email,
            $ipInfo['location']['city']['name'],
            $ipInfo['location']['region']['name'],
            $ipInfo['location']['zip'],
            $ipInfo['ip'],
        ];

        Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
            ->sheetById(config('sheets.post_account_sheet_id'))
            ->append([$append]);

        // send welcome email to the user
        $welcomeMailData = new \stdClass();

        $welcomeMailData->email = $user->email;
        $welcomeMailData->oauthType = $user->oauth_type;

        Mail::to($user)->send(new Welcome($welcomeMailData));

        return $user;
    }
}
