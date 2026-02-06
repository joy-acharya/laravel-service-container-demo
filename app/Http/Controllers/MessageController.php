<?php

namespace App\Http\Controllers;

use App\Contracts\MessageSender;

class MessageController extends Controller
{
    public function send(MessageSender $sender)
    {
        return $sender->send("Hello from Laravel Service Container");
    }
}

?>