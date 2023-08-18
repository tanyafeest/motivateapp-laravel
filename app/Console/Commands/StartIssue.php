<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use JsonException;

class StartIssue extends Command
{
    protected $signature = 'issue {number?}';

    protected $description = 'Create or use an Issue in the GitHub repo.';

    /**
     * @throws JsonException
     */
    public function handle()
    {
        $this->info('Checking to make sure you are ready to start a new issue...');
        $branch = exec('git rev-parse --abbrev-ref HEAD');

        if ($branch !== 'main') {
            $this->error('You are not on the main branch. Please checkout the main branch and make sure it is up to date.');

            return Command::INVALID;
        }

        exec('git fetch && git merge origin/main');

        $this->info('Making sure you have the GitHub CLI installed...');
        exec('gh --version', $gh);

        if (!str_contains(json_encode($gh), 'gh version')) {
            $this->error('You must have the GitHub CLI installed in order to use this command. See https://cli.github.com/');

            return Command::FAILURE;
        }

        $this->info('Looking for new issue information...');

        $number = $this->argument('number');

        // If no number is provided, ask for one
        if (!$number) {
            $number = $this->ask('What is the issue number?');
        }

        // If the number is not numeric, ask if we want to create a new issue
        if (!is_numeric($number)) {
            if (!$this->confirm('Do you want to create a new issue?')) {
                $this->error('You need to either provide an issue number or confirm that you want to create a new issue.');

                return Command::FAILURE;
            }
            $number = last(explode('/', exec('gh issue create --title="' . $number . '" --body="' . $number . '"')));
        }

        $this->info('Generating the branch name...');

        // Get the title of the issue from GitHub
        $issue = exec('gh issue view ' . $number . ' --repo=exactsports/motivemob --json=title');

        $title = data_get(json_decode($issue, true, 512, JSON_THROW_ON_ERROR), 'title');

        $branch = $number . '-' . Str::slug($title);

        $this->info('Checking to see if the branch exists locally');
        exec("git show-branch $branch", $exists);

        if ($exists) {
            exec("git checkout $branch");
            $this->info("Checked out existing branch $branch. Have fun!");

            return Command::SUCCESS;
        }

        $this->info('Looking to see if the branch exists remotely');

        $remote = exec('git ls-remote --heads git@github.com:exactsports/prephero.com.git ' . $branch . ' | wc -l');

        if ((int) $remote === 1) {
            exec("git checkout $branch");
            $this->info("Checked out existing branch $branch. Have fun!");

            return Command::SUCCESS;
        }

        $this->info('Creating your new branch...');

        exec("git checkout -b $branch main");

        exec("git push --set-upstream origin $branch");

        $this->info('Making an initial commit to the new branch...');

        File::append(base_path('issues.txt'), '.');

        $this->info('Pushing an initial commit to the new branch...');
        exec('git add . && git commit -m "Started ' . Str::headline($branch) . '" && git push');

        $this->info('Opening a draft PR...');
        $title = '[ DRAFT ] ' . Str::headline($branch);
        $body = "Issue: https://github.com/exactsports/motivemob/issues/$number";
        exec("gh pr create --assignee=@me --title=\"$title\" --body=\"$body\"");

        $this->info('Your branch and PR are created. Have a great time!');

        return 0;
    }
}
