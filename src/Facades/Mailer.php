<?php

namespace Sevysevy\Mailer\Facades;

use Illuminate\Support\Facades\Facade;

class Mailer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sevysevy\Mailer\EmailService::class;
    }
}
