<?php

namespace App\Console\Commands;

use App\Mail\SendMailUserRegisteration;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRegisteredUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendregistereduser';

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
        $user = User::where('email', session('temp_email'))->first();
        Mail::to($user)->send(new SendMailUserRegisteration());

        return Command::SUCCESS;
    }
}
