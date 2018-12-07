<?php

namespace Tests\Unit\Messaging;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * To test the fake SMS Gateway Client, which is developed as a model for other Real Clients' API
 */
class FakeClientTest extends TestCase
{
    /**
     *
     * @todo it can format a message to multiple recipients
     */

     /** @test */
     public function it_can_format_a_message_to_one_recipient()
     {
         $this->markTestIncomplete();
         //given we have a message, sender id, and recipient, it can generate a url to
     }


    /** @test */
    public function it_can_format_a_message_to_multiple_recipient()
    {
        $this->markTestIncomplete();
        //given we have a message, sender id, and recipient, it can generate a url to
    }
}
