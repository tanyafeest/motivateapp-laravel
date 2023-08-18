<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SharingGuidanceOne;
use App\Mail\SharingGuidanceAll;
use DateTime;
use DateInterval;

class SharingGuidance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sharingguidance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = new DateTime(date('Y-m-d H:i:s'));
        $date = $date->sub(new DateInterval('P1D'));

        $users = User::whereTime('created_at', '<=', $date->format('H:i:s'))->where('is_sharing_guidance', false)->get();
        $allUsers = User::all();

        foreach ($users as $user) {
            // send guidance eamil to this user
            $sharingGuidanceMailData = new \stdClass();
            $sharingGuidanceMailData->name = $user->name;
            $sharingGuidanceMailData->share_link = $user->shareLink();

            Mail::to($user)->send(new SharingGuidanceOne($sharingGuidanceMailData));
            foreach($allUsers as $other) {
                if($other->id == $user->id) {
                    continue;
                }

                $sharingGuidanceAllMailData = new \stdClass();
                $sharingGuidanceAllMailData->name = $user->name;
                $sharingGuidanceAllMailData->share_link = $user->shareLink();

                Mail::to($other)->send(new SharingGuidanceAll($sharingGuidanceAllMailData));
            }

            $user->is_sharing_guidance = true;
            $user->save();
        }

        return Command::SUCCESS;
    }
}
