<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Commit extends Command
{
    protected $signature = 'commit';

    protected $description = 'Lint, run tests, add files to repo, and prompt for a commit message.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $branch = exec('git rev-parse --abbrev-ref HEAD');

        if ($branch === 'main') {
            $this->error('You are on the main branch. You cannot commit directly to the main branch.');

            return Command::INVALID;
        }

        exec('vendor/bin/pint');

        $passed = $this->call('test');

        if ((int) $passed > 0 && !$this->confirm('Your test suite is failing. Do you want to continue committing?')) {
            return Command::INVALID;
        }

        if (exec('git status --short') === '') {
            $this->info('Working tree is clean. Nothing to commit right now.');
        }

        $message = $this->ask('Working tree is dirty. What is your commit message?');

        exec('git add . && git commit --m "' . $message . '"');

        if ($this->confirm('Committed. Do you want to push?', true)) {
            exec('git push');
        }

        return 0;
    }
}
