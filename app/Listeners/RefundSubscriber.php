<?php

namespace App\Listeners;

use App\Events\RefundCoin;
use App\Events\RefundSaldo;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;
use App\FCM\FCM as FCM_Notifications;
use App\Models\FCM as FCM_Models;
use Exception;

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

        $registeredTokens = FCM_Models::distinct()->select("fcmToken")->where('author', $refundSaldo->uid)->get();
        $fcm = new FCM_Notifications();
        foreach ($registeredTokens as $token) {
            try{
                $fcm->postNotification($token->fcmToken, "Penukaran Saldo", "Penukaran saldo untuk ".$refundSaldo->reason." telah berhasil.");
            }
            catch(Exception $e){}
        }
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

        $registeredTokens = FCM_Models::distinct()->select("fcmToken")->where('author', $refundCoin->uid)->get();
        $fcm = new FCM_Notifications();
        foreach ($registeredTokens as $token) {
            try{
                $fcm->postNotification($token->fcmToken, "Penukaran Coin", "Penukaran coin untuk ".$refundCoin->reason." telah berhasil.");
            }
            catch(Exception $e){}
        }
    }

    public function subscribe(Dispatcher $events) :array {
        return [
            RefundSaldo::class => 'handleRefundSaldo',
            RefundCoin::class => 'handleRefundCoin'
        ];
    }
}
