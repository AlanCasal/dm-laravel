<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
	    'name' => $faker->sentence(1) // cada categoría es única, no deberían repetirse. Suena lógico(?)
	];
});
