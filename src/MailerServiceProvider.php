<?php

namespace Sevysevy\Mailer;

use Illuminate\Support\ServiceProvider;
use Sevysevy\Mailer\Drivers\LaravelMailDriver;

class MailerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(EmailService::class, function ($app) {
            return new EmailService(new LaravelMailDriver());
        });
    }

    public function boot()
    {
        // Optional: publish config, migrations, etc.
    }
}
