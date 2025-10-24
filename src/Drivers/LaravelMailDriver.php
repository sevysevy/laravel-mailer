<?php

namespace Sevysevy\Mailer\Drivers;

use Sevysevy\Mailer\Contracts\EmailDriverInterface;
use Sevysevy\Mailer\DTO\SendEmailDTO;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Throwable;

class LaravelMailDriver implements EmailDriverInterface
{
    public function send(SendEmailDTO $message): bool
    {
        try {
            Mail::send($message->template, $message->data, function ($m) use ($message) {
                $m->to($message->to)
                  ->subject($message->subject);

                if (!empty($message->from)) {
                    $m->from($message->from);
                }

                if (!empty($message->attachments)) {
                    foreach ($message->attachments as $file) {
                        $m->attach($file);
                    }
                }
            });

            Log::info('✅ Email sent successfully via LaravelMailDriver', [
                'to' => $message->to,
                'subject' => $message->subject,
            ]);

            return true;
        } catch (Throwable $e) {
            // Symfony mailer or connection errors will be caught here
            Log::error('❌ Email send failed via LaravelMailDriver', [
                'to'    => $message->to,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Optionally rethrow to make higher layers aware
            throw $e;

        }
    }
}
