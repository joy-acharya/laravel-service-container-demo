<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\EmailSender;
use App\Services\SmsSender;
use App\Contracts\MessageSender;

class MessageSenderTest extends TestCase
{
    /** @test */
    public function it_sends_email()
    {
        $sender = new EmailSender();
        $this->assertEquals(
            "EMAIL SENT: Test",
            $sender->send("Test")
        );
    }

    /** @test */
    public function it_sends_sms()
    {
        $sender = new SmsSender();
        $this->assertEquals(
            "SMS SENT: Test",
            $sender->send("Test")
        );
    }

    /** @test */
    public function runtime_binding_works_email_by_default()
    {
        $response = $this->get('/send');
        $response->assertSee('EMAIL SENT:');
    }

    /** @test */
    public function runtime_binding_works_sms()
    {
        $response = $this->get('/send?type=sms');
        $response->assertSee('SMS SENT:');
    }
}
