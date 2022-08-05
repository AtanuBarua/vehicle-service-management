<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\City;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    $region_id = $faker->numberBetween($min = 1, $max = 8);
    $city_id = City::where('region_id',$region_id)->inRandomOrder()->first();
    return [
        //
        'user_id' => $faker->numberBetween($min = 3, $max = 203),
        'amount' => $faker->numberBetween($min = 1000.00, $max = 50000.00),
        'payment' => 'COD',
        'region_id' => $region_id,
        'city_id' => $city_id,
        'address' => $faker->address,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'status' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
