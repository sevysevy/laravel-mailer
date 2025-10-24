<?php

namespace Sevysevy\Mailer;

use Sevysevy\Mailer\DTO\SendEmailDTO;
use Illuminate\Support\Facades\DB;

class EmailLogRepository
{
    public function log(SendEmailDTO $dto, bool $success): void
    {
        DB::table('email_logs')->insert([
            'to' => $dto->to,
            'subject' => $dto->subject,
            'success' => $success,
            'payload' => json_encode($dto->data),
            'created_at' => now(),
        ]);
    }
}
