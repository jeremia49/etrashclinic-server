<?php

namespace App\Listeners;

use App\Events\SampahApproved;
use App\Events\SampahDeclined;
use App\Events\SampahPublished;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;

class SampahEventSubscriber
{

    public function handleSampahPublished(SampahPublished $event):void{
        Notification::create(
            [
                "author"=>$event->sampahPengguna->author,
                "type"=>"SAMPAH",
                "title"=>"Sampah Diupload",
                "content"=>"Unggahan sampah anda telah berhasil. Silahkan menunggu admin memproses sampah anda!",
            ]
        );
    }

    
    public function handleSampahApproved(SampahApproved $event):void{
        Notification::create(
            [
                "author"=>$event->sampahPengguna->author,
                "type"=>"SAMPAH",
                "title"=>"Sampah Diterima",
                "content"=>"Selamat, sampah anda telah diterima. Etrash Currency (EC) dan Koin anda telah bertambah",
            ]
        );
    }

    
    public function handleSampahDeclined(SampahDeclined $event):void{
        Notification::create(
            [
                "author"=>$event->sampahPengguna->author,
                "type"=>"SAMPAH",
                "title"=>"Sampah Ditolak",
                "content"=>"Mohon maaf, sampah anda telah ditolak. Mohon cek kembali dan upload lagi sampah anda",
            ]
        );
    }

    public function subscribe(Dispatcher $events) :array {
        return [
            SampahPublished::class => 'handleSampahPublished',
            SampahApproved::class => 'handleSampahApproved',
            SampahDeclined::class => 'handleSampahDeclined',
        ];
    }
}
