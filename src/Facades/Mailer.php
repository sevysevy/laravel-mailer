<?php

namespace Fakode\Mailer\Facades;

use Illuminate\Support\Facades\Facade;

class Mailer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Fakode\Mailer\EmailService::class;
    }
}
