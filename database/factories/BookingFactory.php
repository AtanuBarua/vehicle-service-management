<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use App\City;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {

    $region_id = $faker->numberBetween($min = 1, $max = 8);
    $city_id = City::where('region_id',$region_id)->inRandomOrder()->first();
    return [
        //
        'user_id' => $faker->numberBetween($min = 3, $max = 203),
        'service_id' => $faker->numberBetween($min = 7, $max = 12),
        'region_id' => $region_id,
        'city_id' => $city_id,
        'date' => $faker->date($format = 'Y-m-d', $min = 'now'),
        'time' => '10am - 2pm',
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'status' => 0,
    ];
});
