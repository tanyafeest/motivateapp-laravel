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
                
                $matchResult = match($user->setting()->sms_frequency){
                    0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 => match ($date->format('l')) {
                        'Monday', 'Tuseday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' => match ($date->format('H')) {
                            '09', '17' =>  $twilio->sendSMS($sms, config('app.phone'), $user->phone),
                            default => null,
                        },
                        default => null,
                    },
                    14, 15 => match($date->format('H')){
                        '09', '17' => $twilio->sendSMS($sms, config('app.phone'), $user->phone),
                        default => null,
                    },
                    16, 17 => match($firstMondayOfThisMonth->format('Y-m-d')){
                        $date->format('Y-m-d') => match($date->format('H')){
                            '09', '17' => $twilio->sendSMS($sms, config('app.phone'), $user->phone),
                            default => null,
                        },
                        default => null,
                    },
                    default => null,
                };
            }
        }

        return Command::SUCCESS;
    }
}
