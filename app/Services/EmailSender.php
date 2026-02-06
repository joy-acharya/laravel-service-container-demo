<?php

namespace App\Services;

use App\Contracts\MessageSender;

class EmailSender implements MessageSender
{
    public function send(string $message)
    {
        return "EMAIL SENT: " . $message;
    }
}

?>