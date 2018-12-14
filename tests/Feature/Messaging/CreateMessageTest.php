<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Session;

class CreateMessageTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_user_can_compose_a_message()
    {

        $response = $this->signIn()
           ->get('/messages/create');

        $response->assertSuccessful();

        $response->assertSee('Compose Greetings');
    }

    /** @test */
    public function sender_id_is_required ()
    {
       $response =  $this->signIn()
            ->createMessageFromUrl( factory(Message::class)->make(['sender_id' => ''] ));

        $response->assertSessionHasErrors('sender_id');

    }
    /** @test */
    public function sender_id_cannot_be_over_11_characters ()
    {
        $response =  $this->signIn()
            ->createMessageFromUrl( factory(Message::class)->make(['sender_id' => '1234567891011'] ));

        $response->assertSessionHasErrors('sender_id');

    }

    /** @test */
    public function a_message_must_have_at_least_one_recipient ()
    {
        $response =  $this->signIn()
            ->createMessageFromUrl( factory(Message::class)->make(['recipients' => ''] ));

        $response->assertSessionHasErrors('recipients');

    }
    /** @test */
    public function each_recipient_must_be_a_valid_phone_number ()
    {
        $response =  $this->signIn()
            ->createMessageFromUrl( factory(Message::class)->make(
                ['recipients' => ['0809'] ]
             ));

        $response->assertSessionHasErrors('recipients');

    }

    /** @test */
    public function a_user_can_create_a_message_to_be_sent_to_one_recipient()
    {
        $response = $this->signIn()
                    ->createMessageFromUrl(
                        factory(Message::class)->make(['recipients' => ['09028020900']])
                     );

        $this->assertDatabaseHas('messages', [
             'recipients' => '09028020900',
         ]);
    }

    /** @test */
    public function a_user_can_create_a_message_to_be_sent_to_multiple_recipients()
    {
        $this->withExceptionHandling();
        $response = $this->signIn()
                    ->createMessageFromUrl(
                        factory(Message::class)->make(
                            ['recipients' => ['09028020900', '08138350529', '09057556891']]
            ));

        $this->assertDatabaseHas('messages', [
             'recipients' => '09028020900,08138350529,09057556891',
         ]);

    }

    /** @test  */
    public function on_validation_the_user_confirms_the_message_details_and_cost()
    {

        $response = $this->signIn()
            ->createMessageFromUrl( factory(Message::class)->make() );

        $response->assertRedirect( route('message.confirm', auth()->user()) );

    }

}
