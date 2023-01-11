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

        foreach ($users as $key => $user) {
            if($user->numberOfQuotes()) {
                // send SMS
                $latestInspiration = $user->inspirations->last();

                $quote = $latestInspiration->quote->quote;
                $sharedByUserName = $latestInspiration->sharedByUser->name;
                
                $sms = $sharedByUserName . ':' . '"' . $latestInspiration->quote->truncate() . '" View at ' . config('app.url') . 'inspiration/card/' . $latestInspiration->id . '. Reply UNSUB to be removed';

                switch($user->setting->sms_frequency) {
                    case 0: // Monday morning
                        if(date('l') == 'Monday' && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 1: // Monday night
                        if(date('l') == 'Monday' && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 2: // Tuesday morning
                        if(date('l') == 'Tuesday' && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 3: // Tuesday night
                        if(date('l') == 'Tuesday' && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 4: // Wednesday morning
                        if(date('l') == 'Wednesday' && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 5: // Wednesday night
                        if(date('l') == 'Wednesday' && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 6: // Thursday morning
                        if(date('l') == 'Thursday' && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 7: // Thursday night
                        if(date('l') == 'Thursday' && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 8: // Friday morning
                        if(date('l') == 'Friday' && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 9: // Friday night
                        if(date('l') == 'Friday' && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 10: // Saturday morning
                        if(date('l') == 'Saturday' && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 11: // Saturday night
                        if(date('l') == 'Saturday' && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 12: // Sunday morning
                        if(date('l') == 'Sunday' && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 13: // Sunday night
                        if(date('l') == 'Sunday' && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 14: // daily morning
                        if(date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 15: // daily night
                        if(date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 16: // monthly first Monday morning
                        if($firstMondayOfThisMonth->format('Y-m-d') == date('Y-m-d') && date('H') == '09') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    case 17: // monthly first Monday night
                        if($firstMondayOfThisMonth->format('Y-m-d') == date('Y-m-d') && date('H') == '17') {
                            $twilio->sendSMS($sms, config('app.phone'), $user->phone);
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        return Command::SUCCESS;
    }
}
