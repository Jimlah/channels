<?php

namespace NotificationChannels\SMSTo;

use Illuminate\Support\Arr;

class SMSToMessage
{
    public string $to;
    public string $sender_id;
    public array $lines;

    public function __construct($notifiable)
    {
        $this->to = $notifiable->routeNotificationFor('SMSTo');
    }

    public function to(string|array $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function senderId(string $senderId): self
    {
        $this->sender_id = $senderId;

        return $this;
    }

    public function lines(array $lines): self
    {
        $this->lines = $lines;

        return $this;
    }

    public function line(string $line): self
    {
        $this->lines[] = $line;

        return $this;
    }
}
