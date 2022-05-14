<?php

namespace Unit;

use Mockery;
use NotificationChannels\SMSTo\SMSToClient;
use NotificationChannels\SMSToChannel;
use PHPUnit\Framework\TestCase;

class SMSToChannelTest extends TestCase
{
    private $channel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->channel = Mockery::mock(SMSToChannel::class);

    }

    public function testChannel()
    {
        $response = $this->channel
        ->shouldReceive(SMSToClient::class)
        ->withArgs();
        var_dump($response);
    }
}
