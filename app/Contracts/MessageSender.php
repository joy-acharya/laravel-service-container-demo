<?php

namespace App\Contracts;

interface MessageSender
{
    public function send(string $message);
}

?>