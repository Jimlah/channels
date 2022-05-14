<?php

namespace NotificationChannels\SMSTo;

use Illuminate\Contracts\Foundation\Application;
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
            ->give(function (Application $app) {
                return new SMSToClient($app['config']['sms-to-channel']);
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
