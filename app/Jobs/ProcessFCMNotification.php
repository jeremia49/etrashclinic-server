<?php

namespace App\Jobs;

use App\FCM\FCM as FCM_Notifications;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessFCMNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $target,
        public string $title,
        public string $body,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $fcm = new FCM_Notifications();

        try {
            $fcm->postNotification($this->target, $this->title, $this->body);
        } catch (Exception $e) {
            return;
        }
    }
}
