<?php

namespace Sevysevy\Mailer\Contracts;

use Sevysevy\Mailer\DTO\SendEmailDTO;

interface EmailDriverInterface
{
    public function send(SendEmailDTO $message): bool;
}
