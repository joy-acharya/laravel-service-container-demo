<?php

namespace App\Services;

use App\Contracts\MessageSender;

class SmsSender implements MessageSender
{
    public function send(string $message)
    {
        return "SMS SENT: " . $message;
    }
}
