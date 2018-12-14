<?php

use Faker\Generator as Faker;
use App\User;
use App\Message;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'sender_id' => 'SGreetings',
        'sender' => function(){ return factory(User::Class)->create(); },
        'message_body' => $faker->text(20),
        'recipients' => ['08100699413', '08153522356'],
        'schedule_time' => now()->toDateTimeString(),
    ];
});
