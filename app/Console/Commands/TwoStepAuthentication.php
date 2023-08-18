<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Actions\Util\Twilio;
use DateTime;
use DateInterval;

class TwoStepAuthentication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:twostepauth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Two step authentication';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $twilio = new Twilio();
        $date = new DateTime(date('Y-m-d H:i:s'));
        $date = $date->sub(new DateInterval('PT30M'));

        $users = User::whereTime('created_at', '<=', $date->format('H:i:s'))->where('is_sent_two_step_auth', false)->get();

        foreach ($users as $user) {
            // send two step authentication to the user's phone
            $twilio->sendSMS('Reply "YES" to continue receiving inspiration from MotiveMob and all your friends & family! Or reply "UNSUB" to be removed.', config('app.phone'), $user->phone);
            $user->is_sent_two_step_auth = true;
            $user->save();
        }

        return Command::SUCCESS;
    }
}
