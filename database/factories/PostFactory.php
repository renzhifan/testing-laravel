<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1,10),
        'title'=>$faker->sentence,
        'body'=>$faker->sentence,
    ];
});
