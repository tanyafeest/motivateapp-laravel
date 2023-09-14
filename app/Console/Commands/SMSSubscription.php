<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\Util\Twilio;
use App\Models\User;
use Illuminate\Support\Carbon;

class SMSSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:smssubscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SMS Subscription';

    /**
     * Send SMS to everyone upone each one's sms_frequency(Morning: 9:00 UTC, Night: 17:00 UTC)
     *
     * @return int
     */
    public function handle()
    {
        $twilio = new Twilio();
        $users = User::all();

        $firstMondayOfThisMonth = new Carbon('first Monday of this month');
        $date = Carbon::now();
        foreach ($users as $key => $user) {
            if($user->numberOfQuotes()) {
                // send SMS
                $latestInspiration = $user->inspirations()->last();

                $quote = $latestInspiration->quote->quote;
                $sharedByUserName = $latestInspiration->sharedbyUser->name;
                
                $sms = $sharedByUserName . ':' . '"' . $latestInspiration->quote->truncate() . '" View at ' . config('app.url') . 'inspiration/card/' . $latestInspiration->id . '. Reply UNSUB to be removed';
                $matchResult = match ($user->setting()->sms_frequency) {
                    0 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Monday' && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    1 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Monday' && $date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    2 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Tuesday' && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    3 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Tuesday' && $date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    4 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Wednesday' && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    5 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Wednesday' && $date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    6 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Thursday' && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    7 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Thursday' && $date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    8 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Friday' && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    9 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Friday' && $date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    10 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Saturday' && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    11 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Saturday' && $date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    12 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Sunday' && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    13 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('l') == 'Sunday' && $date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    14 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    15 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('H') == '17') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    16 => function($sms, $twilio, $userPhone, $date){
                       if($date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,
                    17 => function($sms, $twilio, $userPhone, $firstMondayOfThisMonth, $date){
                       if($firstMondayOfThisMonth->format('Y-m-d') == $date->format('Y-m-d') && $date->format('H') == '09') {
                           $twilio->sendSMS($sms, config('app.phone'), $userPhone);
                       }
                       return;
                    } ,

                    default => null,
                };
            }
        }

        return Command::SUCCESS;
    }
}
