<?php

namespace NotificationChannels\SMSTo;

use GuzzleHttp\Client;


class SMSToClient
{
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.smsto.co/',
        ]);
    }

    public function post($path, array $data)
    {
        return $this->client->request('POST', $path, [
            'body' => $data,
        ]);
    }
}
