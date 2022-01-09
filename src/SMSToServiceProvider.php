<?php

namespace NotificationChannels\SMSTo;

use Illuminate\Support\ServiceProvider;
use NotificationChannels\SMSToChannel;

class SMSToServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(SMSToChannel::class)
            ->needs(SMSToClient::class)
            ->give(function () {
                return new SMSToClient(config('services.sms-to'));
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
