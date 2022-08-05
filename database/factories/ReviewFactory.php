<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->numberBetween($min = 3, $max = 203),
        'product_id' => $faker->numberBetween($min = 10, $max = 209),
        'review' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'star' => $faker->numberBetween($min = 1, $max = 5),
        'status' => 1,    
    ];
});
