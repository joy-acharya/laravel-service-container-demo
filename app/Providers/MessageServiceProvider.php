<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\MessageSender;
use App\Services\EmailSender;
use App\Services\SmsSender;
use Illuminate\Http\Request;

class MessageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MessageSender::class, function ($app) {
            $request = $app->make(Request::class);
            return $request->query('type') === 'sms'
                ? $app->make(SmsSender::class)
                : $app->make(EmailSender::class);
        });
    }

    public function boot()
    {
        //
    }
}
