<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->sentence($nbWords = 7, $variableNbWords = true);
    $slug = str_slug($name, '-');

    return [
        //
        'brand_id' => $faker->numberBetween($min = 2, $max = 7),
        'category_id' => $faker->numberBetween($min = 1, $max = 5),
        'name' => $name,
        'slug' => $slug,
        'description' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'image' => 'https://picsum.photos/800/800',
        'regular_price' => $faker->numberBetween($min = 500, $max = 8000),
        'discount_price' => $faker->numberBetween($min = 400, $max = 7000),
        'stock' => $faker->numberBetween($min = 20, $max = 100),
        'sold' => $faker->numberBetween($min = 10, $max = 25),
        'availability' => 1,
        'status' => 1,
        'star' => 4,
    ];
});
