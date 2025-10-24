<?php

namespace App\Services\Mailer\Contracts;

use App\Services\Mailer\DTO\SendEmailDTO;

interface EmailDriverInterface
{
    public function send(SendEmailDTO $message): bool;
}
