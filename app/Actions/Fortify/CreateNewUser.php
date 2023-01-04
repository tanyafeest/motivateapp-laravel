<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Actions\Util\CalculateGradYear;
use App\Actions\Util\IpBase;
use App\Actions\Util\Twilio;
use App\Rules\PhoneValidationRule;
use App\Models\User;
use App\Models\Setting;
use Revolution\Google\Sheets\Facades\Sheets;
use Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

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
        $ipbase = new IpBase();
        $twilio = new Twilio();
        $calculateGradeYear = new CalculateGradYear();

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users', new PhoneValidationRule()],
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
        $user->phone = str_replace(' ', '', $input['phone']);
        $user->gender = $input['gender'];
        $user->age = $input['age'];
        $user->grade_year = isset($input['current_grade']) ? $calculateGradeYear->calc($input['current_grade']) : null;
        $user->sport_id = isset($input['sport']) ? $input['sport'] : null;
        $user->password = Hash::make($input['password']);
        $user->share_link = uniqid();
        $user->profile_photo_path = session('temp_avatar');
        $user->save();

        $setting = new Setting;
        $setting->user_id = $user->id;
        $setting->save();

        // save user data on account sheet
        // TODO: twitter, facebook, instagram public profile url check
        $ipinfo = $ipbase->info(Request::ip());
        $append = [
            Carbon::now()->format('m/d/y'),
            session('temp_social_app'),
            session('temp_id'),
            $input['first_name'] . " " . $input['last_name'],
            $input['email'],
            $ipinfo['location']['city']['name'],
            $ipinfo['location']['region']['name'],
            $ipinfo['location']['zip'],
            $ipinfo['ip'],
        ];

        Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
            ->sheetById(config('sheets.post_account_sheet_id'))
            ->append([$append]);

        // send welcome email to the user
        $welcomeMailData = new \stdClass();

        $welcomeMailData->email = $input['email'];
        $welcomeMailData->oauthType = session('temp_social_app');

        Mail::to('hello@motivemob.com')->send(new Welcome($welcomeMailData));

        // send two step authentication to the user's phone
        $twilio->sendSMS('Reply "YES" to continue receiving inspiration from MotiveMob and all your friends & family! Or reply "UNSUB" to be removed.', config('app.phone'), str_replace(' ', '', $input['phone']));

        return $user;
    }
}
