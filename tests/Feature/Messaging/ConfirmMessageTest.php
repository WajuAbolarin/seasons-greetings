<?php

namespace Tests\Feature\Messaging;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Message;
use Illuminate\Support\Facades\Mail;

class ConfirmMessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function a_valid_unconfirmed_message ()
    {
        $this->withoutExceptionHandling();
        $message = factory(Message::class)->create(['recipients' => '09028020900' ]);

        session()->flash('message', $message);

        $response = $this->signIn()
            ->get(
                route('message.confirm', [auth()->user(), $message])
            );

        $response->assertSee($message->sender_id);
    }

    /** @test  */
    public function when_a_confirmation_page_is_reloaded()
    {
        $this->withoutExceptionHandling();
        $message = factory(Message::class)->create(['recipients' => '09028020900' ]);

        $response = $this->signIn()
            ->followingRedirects()
            ->get(
                route('message.confirm', [auth()->user(), $message])
            );
        $response->assertLocation('/'); //weird should be '/home'
    }

    /** @test */
    public function confirming_a_previously_composed_greeting()
    {
        $message = factory(Message::class)->create(['recipients' => '09028020900' ]);

        $response = $this->signIn()
            ->followingRedirects()
            ->get(
                route('message.confirm', [auth()->user(), $message])
        );

        $response->assertSuccessful(); //weird should be '/home'
        $response->assertSee($message->sender_id);

    }

    /**@test */
        //database has message confirmed
    /** @test */
    public function confirming_a_greeting_for_sending()
    {
        Mail::fake();

        //@todo handle account balance...

        $this->withoutExceptionHandling();
        $message = factory(Message::class)->create(['recipients' => '09028020900' ]);

        $response = $this->signIn()
            ->followingRedirects()
            ->post(
                route('message.confirm.store'),
                [
                    'message_id' => $message->id
                ]
            );

        $response->assertSuccessful() //weird should be '/home'
            ->assertSee('Your Greetings have been have been sent');

        $this->assertDatabaseHas(
            'messages',
            [
                'id' => $message->id,
                'confirmed' => 1,
            ]);

            //mail sent
        //queue as job to send message

    }
}
