<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Technician;
use App\City;
use Faker\Generator as Faker;

$factory->define(Technician::class, function (Faker $faker) {

    $region_id = $faker->numberBetween($min = 1, $max = 8);
    $city_id = City::where('region_id',$region_id)->inRandomOrder()->first();
    return [
        //
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'region_id' => $region_id,
        'city_id' => $city_id,
        'availability' => 1,
        'slot' => 3,
        'queue' => 0,
    ];
});
