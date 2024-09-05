<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CalculateUserTotalAndAssignLeague implements ShouldQueue
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

    public static function execute():void
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $totalSampahBulanIni = DB::table('users')
            ->selectRaw("id, (
            SELECT
                    SUM(`total`)
                FROM
                    `table_sampah`
                WHERE
                    `table_sampah`.`isApproved` = '1' AND `table_sampah`.`author` = `users`.`id` AND `table_sampah`.`satuan` = 'kg' AND MONTH(`table_sampah`.`created_at`) = ? AND YEAR(`table_sampah`.`created_at`) = ?
            ) as totalSampah", [$currentMonth, $currentYear])
            ->get();

        foreach ($totalSampahBulanIni as $dataSampah) {
            $user = User::find($dataSampah->id);
            $user->totalSampahBulanIni = $dataSampah->totalSampah ?: 0;
            $user->leagueBulanIni = "";
            if ($dataSampah->totalSampah != null) {
                if ($dataSampah->totalSampah > 0 && $dataSampah->totalSampah <= 20) {
                    $user->leagueBulanIni = "silver";
                } else if ($dataSampah->totalSampah > 20 && $dataSampah->totalSampah <= 50) {
                    $user->leagueBulanIni = "gold";
                } else if ($dataSampah->totalSampah > 50 && $dataSampah->totalSampah <= 100) {
                    $user->leagueBulanIni = "platinum";
                } else if ($dataSampah->totalSampah > 100 && $dataSampah->totalSampah <= 200) {
                    $user->leagueBulanIni = "diamond";
                } else if ($dataSampah->totalSampah > 200) {
                    $user->leagueBulanIni = "ascendant";
                }
            }
            $user->save();
        }
    }
}
