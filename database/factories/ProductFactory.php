<?php

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
	return [
		'description' => $faker->sentence(5), // hasta 75 caracteres
		'price' => $faker->numberBetween(500, 10000) // 8 enteros, 2 decimales
    ];
});
