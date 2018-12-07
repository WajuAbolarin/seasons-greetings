<?php

namespace Tests\Feature\Messaging;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SMSTest extends TestCase
{

    use RefreshDatabase;

    protected $user;

    public function setUp(){
        parent::setUp();
        $this->user =  factory(User::class)->create();
    }


    /**
     *
     * @test
     */
    public function a_user_can_compose_a_message()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/messages/create');

        $response->assertSuccessful();

        $this->assertSee('compose');
        // $this->assert
    }


    /**
     *
     * @test
     */
    public function a_user_can_create_a_message_to_be_sent_to_one_recipient()
    {
        $this->withoutExceptionHandling();
        $response = $this->createMessageFromUrl( [
            'sender_id'         => 'ExampleID',
            'message_body'      => 'Some message body',
            'recipients'        => ['09028020900'],
            'schedule_time'     => now(),
        ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas('messages', [
             'sender' => $this->user->id,
             'sender_id' => 'ExampleID',
             'message_body' => 'Some message body',
             'recipients' => '09028020900',
             'schedule_time' => now()->toDateTimeString(),
         ]);
    }

    /** @test */
    public function a_user_can_create_a_message_to_be_sent_to_multiple_recipient()
    {
        $this->withoutExceptionHandling();
        $response = $this->createMessageFromUrl( [
            'sender_id'         => 'ExampleID',
            'message_body'      => 'Some message body',
            'recipients'        => ['09028020900', '09057556891'],
            'schedule_time'     => now(),
        ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas('messages', [
             'sender' => $this->user->id,
             'sender_id' => 'ExampleID',
             'message_body' => 'Some message body',
             'recipients' => '09028020900,09057556891',
             'schedule_time' => now()->toDateTimeString(),
         ]);
    }

    private function createMessageFromUrl($data)
    {
        return  $this->actingAs($this->user)
                    ->post('/messages', $data);
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
     * @todo When a user sends a message it gets added to a queu to be processed through one of our clients
     *
     * @todo When a user's message(s) is sent they recieve a sample of the message on their registered line
     *
     * @todo When a user's message is sent they recieve a mail with the breakdown of the message(s) -- recipients,       cost, estimated delivery time, message content, sender id
     *
     *
     *
     */

}

