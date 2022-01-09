<?php

namespace NotificationChannels\SMSTo;

use GuzzleHttp\Client;


class SMSToClient
{
    protected $client;
    protected $apiKey;
    protected $apiToken;

    public function __construct(array $config)
    {
        $this->apiKey = $config['api_key'];
        $this->apiToken = $config['acces_token'];

        $bearer_key = $this->apiToken ?? $this->apiKey;

        $this->client = new Client([
            'base_uri' => 'https://api.smsto.co/',
            'headers' => [
                'Authorization' => 'Bearer ' . $bearer_key,
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function post($path, array $data)
    {
        return $this->client->request('POST', $path, [
            'body' => $data,
        ]);
    }
}
