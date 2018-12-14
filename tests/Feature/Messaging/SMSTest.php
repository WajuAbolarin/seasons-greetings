<?php

namespace Tests\Feature\Messaging;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SMSTest extends TestCase
{
    /** @test */
    public function dummy(){
        $this->assertTrue(true);
    }

    /**
     * @todo Test a user can sign up for the application with their email and phonenumber
     *         A user must verify their email to use the service
     *
     * @todo A newly registered user has 5 free "wishes" to send.
     *
     * @todo When a user sends a page (less, the number of words in marketing content) of "wishes" they have one less "wish" to send.

     * @todo When a user sends a wish, marketing content e.g sent from 'seasonsgreetings.com.ng' is appended to their   message to make it one full page
     *
     * @todo When a user exhausts their free wishes, they can no longer send messages without making payments.
     *
     * @todo When a user sends a message it gets added to a queue to be processed through one of our clients
     *
     * @todo When a user's message(s) is sent they recieve a sample of the message on their registered line
     *
     * @todo When a user's message is sent they recieve a mail with the breakdown of the message(s) -- recipients,       cost, estimated delivery time, message content, sender id
     *
     *
     *
     */

}

