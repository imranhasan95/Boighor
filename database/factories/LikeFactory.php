<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;

use App\Model;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
          'user_id' => random_int(1, 10),
          'likes_count' => $faker->randomDigitNotNull,
    ];
});
