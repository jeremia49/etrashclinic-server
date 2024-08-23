<?php

namespace App\Listeners;

use App\Events\RefundCoin;
use App\Events\RefundSaldo;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;

class RefundSubscriber
{
    public function handleRefundSaldo(RefundSaldo $refundSaldo){
        Notification::create(
            [
                "author"=>$refundSaldo->uid,
                "type"=>"MONEY",
                "title"=>"Penukaran Saldo",
                "content"=>"Penukaran saldo untuk ".$refundSaldo->reason." telah berhasil.",
            ]
        );
    }

    public function handleRefundCoin(RefundCoin $refundCoin){
        Notification::create(
            [
                "author"=>$refundCoin->uid,
                "type"=>"MONEY",
                "title"=>"Penukaran Koin",
                "content"=>"Penukaran coin untuk ".$refundCoin->reason." telah berhasil."
            ]
        );
    }

    public function subscribe(Dispatcher $events) :array {
        return [
            RefundSaldo::class => 'handleRefundSaldo',
            RefundCoin::class => 'handleRefundCoin'
        ];
    }
}
