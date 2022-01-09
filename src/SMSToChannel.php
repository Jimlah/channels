<?php

namespace NotificationChannels;

use Illuminate\Notifications\Notification;
use NotificationChannels\SMSTo\Exceptions\CouldNotSendNotification;
use NotificationChannels\SMSTo\SMSToClient;

class SMSToChannel
{
    protected $client;

    public function __construct(SMSToClient $client)
    {
        $this->client = $client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMSTo($notifiable);

        if (is_null($message->to) || empty($message->to)) {
            throw CouldNotSendNotification::serviceRespondedWithAnError("SMSTo", "No recipient specified");
        }

        $response = $this->client->post($message->to, $message->toArray());

        if ($response->getStatusCode() !== 200) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($response->message);
        }
    }
}
