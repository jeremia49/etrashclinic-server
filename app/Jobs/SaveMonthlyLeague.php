<?php

namespace App\Jobs;

use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class SaveMonthlyLeague implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->execute();
    }

    public static function execute(): void
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $leagues = ['silver', 'gold', 'platinum', 'diamond', 'ascendant'];
        foreach ($leagues as $league) {
            $ranknumber = 1;
            $users = User::where('leagueBulanIni', $league)->orderBy('totalSampahBulanIni','desc')->get();
            foreach ($users as $user) {
                $leaderboard = new Leaderboard();
                $leaderboard->bulan = $currentMonth;
                $leaderboard->tahun = $currentYear;
                $leaderboard->league = $league;
                $leaderboard->authorID = $user->id;
                $leaderboard->totalSampah = $user->totalSampahBulanIni;
                $leaderboard->rank = $ranknumber;
                $leaderboard->save();
                $ranknumber++;
            }
        }

    }
}
