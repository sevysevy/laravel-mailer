<?php 

namespace App\Services\Mailer\Drivers;

use App\Services\Mailer\Contracts\EmailDriverInterface;
use App\Services\Mailer\DTO\SendEmailDTO;
use Illuminate\Support\Facades\Mail;

class LaravelMailDriver implements EmailDriverInterface
{
    public function send(SendEmailDTO $message): bool
    {
        Mail::send($message->template, $message->data, function ($m) use ($message) {
            $m->to($message->to)
              ->subject($message->subject);

            if ($message->from) {
                $m->from($message->from);
            }

            foreach ($message->attachments as $file) {
                $m->attach($file);
            }
        });

        return true;
    }
}
