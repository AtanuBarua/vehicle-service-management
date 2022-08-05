<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {

    $price = $faker->numberBetween($min = 500.00, $max = 8000.00);
    $quantity = $faker->numberBetween($min = 1, $max = 10);
    $subtotal = $price * $quantity;
    $order_id = 237;
    $rand = $faker->numberBetween($min = 1, $max = 4);
    return [
        //
        'order_id' => $order_id+=$rand,
        'product_id' => $faker->numberBetween($min = 10, $max = 209),
        'user_id' => $faker->numberBetween($min = 3, $max = 203),
        'price' => $price,
        'quantity' => $quantity,
        'subtotal' => $subtotal,
        'status' => $faker->numberBetween($min = 0, $max = 1),
        'reviewed' => 0,
    
    ];
});
