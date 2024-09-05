<?php

namespace App\Console\Commands;

use App\Jobs\CalculateUserTotalAndAssignLeague;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateUserSampahTotalAndLeague extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-user-sampah-total-and-league';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update User Sampah Total And League';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CalculateUserTotalAndAssignLeague::execute();
    }
}
