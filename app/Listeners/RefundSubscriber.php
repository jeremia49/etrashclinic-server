<?php

namespace App\Listeners;

use App\Events\RefundCoin;
use App\Events\RefundSaldo;
use App\Jobs\ProcessFCMNotification;
use App\Models\FCM as FCM_Models;
use App\Models\Notification;
use Exception;
use Illuminate\Events\Dispatcher;

class RefundSubscriber
{
    public function handleRefundSaldo(RefundSaldo $refundSaldo)
    {
        Notification::create(
            [
                "author" => $refundSaldo->uid,
                "type" => "MONEY",
                "title" => "Penukaran Saldo",
                "content" => "Penukaran saldo untuk " . $refundSaldo->reason . " telah berhasil.",
            ]
        );

        $registeredTokens = FCM_Models::distinct()->select("fcmToken")->where('author', $refundSaldo->uid)->get();
        foreach ($registeredTokens as $token) {
            try {
                ProcessFCMNotification::dispatch($token->fcmToken, "Penukaran Saldo", "Penukaran saldo untuk " . $refundSaldo->reason . " telah berhasil.");
            } catch (Exception $e) {
            }
        }
    }

    public function handleRefundCoin(RefundCoin $refundCoin)
    {
        Notification::create(
            [
                "author" => $refundCoin->uid,
                "type" => "MONEY",
                "title" => "Penukaran Koin",
                "content" => "Penukaran coin untuk " . $refundCoin->reason . " telah berhasil."
            ]
        );

        $registeredTokens = FCM_Models::distinct()->select("fcmToken")->where('author', $refundCoin->uid)->get();
        foreach ($registeredTokens as $token) {
            try {
                ProcessFCMNotification::dispatch($token->fcmToken, "Penukaran Coin", "Penukaran coin untuk " . $refundCoin->reason . " telah berhasil.");
            } catch (Exception $e) {
            }
        }
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            RefundSaldo::class => 'handleRefundSaldo',
            RefundCoin::class => 'handleRefundCoin'
        ];
    }
}
