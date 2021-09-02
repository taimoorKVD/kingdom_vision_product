<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Website\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => 1,
        'price' => $faker->numberBetween($min = 5000, $max = 19000),
    ];
});
