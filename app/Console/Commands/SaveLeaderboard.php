<?php

namespace App\Console\Commands;

use App\Jobs\SaveMonthlyLeague;
use Illuminate\Console\Command;

class SaveLeaderboard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-leaderboard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save Monthly Leaderboard';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SaveMonthlyLeague::execute();
    }
}
