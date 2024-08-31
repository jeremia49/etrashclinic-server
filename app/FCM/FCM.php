<?php

namespace App\FCM;

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class FCM
{
    private $client;

    public function __construct() {
        $scopes = ['https://www.googleapis.com/auth/firebase.messaging'];

        $middleware = ApplicationDefaultCredentials::getMiddleware($scopes);
        $stack = HandlerStack::create();
        $stack->push($middleware);

        $this->client = new Client([
            'handler' => $stack,
            'base_uri' => 'https://www.googleapis.com',
            'auth' => 'google_auth'
        ]);
    
    }

    public function postNotification(string $target, string $title, string $body)
    {
        $response =
            $this->client->post(
                env('FIREBASE_HOST_URL'),
                [
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Content-Type'  => 'application/json',
                    ],
                    'json' => [
                        'validate_only' => false,
                        'message' => [
                            "notification" => [
                                "title" => $title,
                                "body" => $body
                            ],
                            'token' => $target
                        ],
                    ],
                ]
            );
        if ($response->getStatusCode() == 200) {
            return true;
        }
        return false;
    }
}
