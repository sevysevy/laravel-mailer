<?php

namespace Sevysevy\Mailer\DTO;

class SendEmailDTO
{
    public function __construct(
        public string $to,
        public string $subject,
        public string $template,
        public array $data = [],
        public ?string $from = null,
        public ?array $attachments = [],
    ) {}
}