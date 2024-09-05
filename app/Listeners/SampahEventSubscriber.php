<?php

namespace App\Listeners;

use App\Events\SampahApproved;
use App\Events\SampahDeclined;
use App\Events\SampahPublished;
use App\FCM\FCM as FCM_Notifications;
use App\Jobs\ProcessFCMNotification;
use App\Models\FCM as FCM_Models;
use App\Models\Notification;
use Exception;
use Illuminate\Events\Dispatcher;

class SampahEventSubscriber
{

    public function handleSampahPublished(SampahPublished $event): void
    {
        Notification::create(
            [
                "author" => $event->sampahPengguna->author,
                "type" => "SAMPAH",
                "title" => "Sampah Diupload",
                "content" => "Unggahan sampah anda telah berhasil. Silahkan menunggu admin memproses sampah anda!",
            ]
        );

        $registeredTokens = FCM_Models::distinct()->select("fcmToken")->where('author', $event->sampahPengguna->author)->get();
        foreach ($registeredTokens as $token) {
            try {
                ProcessFCMNotification::dispatch($token->fcmToken, "Sampah Diupload", "Unggahan sampah anda telah berhasil. Silahkan menunggu admin memproses sampah anda!");
            } catch (Exception $e) {
            }
        }
    }


    public function handleSampahApproved(SampahApproved $event): void
    {
        Notification::create(
            [
                "author" => $event->sampahPengguna->author,
                "type" => "SAMPAH",
                "title" => "Sampah Diterima",
                "content" => "Selamat, sampah anda telah diterima. Etrash Currency (EC) dan Koin anda telah bertambah",
            ]
        );

        $registeredTokens = FCM_Models::distinct()->select("fcmToken")->where('author', $event->sampahPengguna->author)->get();
        foreach ($registeredTokens as $token) {
            try {
                ProcessFCMNotification::dispatch($token->fcmToken, "Sampah Diterima", "Selamat, sampah anda telah diterima. Etrash Currency (EC) dan Koin anda telah bertambah");
            } catch (Exception $e) {
            }
        }
    }


    public function handleSampahDeclined(SampahDeclined $event): void
    {
        Notification::create(
            [
                "author" => $event->sampahPengguna->author,
                "type" => "SAMPAH",
                "title" => "Sampah Ditolak",
                "content" => "Mohon maaf, sampah anda telah ditolak. Mohon cek kembali dan upload lagi sampah anda",
            ]
        );

        $registeredTokens = FCM_Models::distinct()->select("fcmToken")->where('author', $event->sampahPengguna->author)->get();
        $fcm = new FCM_Notifications();
        foreach ($registeredTokens as $token) {
            try {
                ProcessFCMNotification::dispatch($token->fcmToken, "Sampah Ditolak", "Mohon maaf, sampah anda telah ditolak. Mohon cek kembali dan upload lagi sampah anda");
            } catch (Exception $e) {
            }
        }
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            SampahPublished::class => 'handleSampahPublished',
            SampahApproved::class => 'handleSampahApproved',
            SampahDeclined::class => 'handleSampahDeclined',
        ];
    }
}
