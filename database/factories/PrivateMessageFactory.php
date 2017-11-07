<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\PrivateMessage::class, function (Faker $faker) {
    return [
        'sender_id' => rand(1, 3),
        'receiver_id' => rand(1, 3),
        'subject' => str_random(20),
        'message' => str_random(50),
        'read' => rand(0,1)
    ];
});
