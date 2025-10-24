<?php

namespace Sevysevy\Mailer;

use Sevysevy\Mailer\Contracts\EmailDriverInterface;
use Sevysevy\Mailer\DTO\SendEmailDTO;

class EmailService
{
    public function __construct(
        protected EmailDriverInterface $driver,
        protected ?EmailLogRepository $logger = null
    ) {}

    public function send(SendEmailDTO $dto): bool
    {
        $success = $this->driver->send($dto);

        if ($this->logger) {
            $this->logger->log($dto, $success);
        }

        return $success;
    }
}
