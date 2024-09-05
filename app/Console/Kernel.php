<?php

namespace App\Console;

use App\Jobs\CalculateUserTotalAndAssignLeague;
use App\Jobs\SaveMonthlyLeague;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command('queue:work --stop-when-empty')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->job(new CalculateUserTotalAndAssignLeague)
            ->everyFiveMinutes()
            ->withoutOverlapping();

        $schedule->job(new SaveMonthlyLeague())
            ->lastDayOfMonth('23:59');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
