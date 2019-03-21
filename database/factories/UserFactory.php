<?php

use Faker\Generator as Faker;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

	$userName = $faker->unique()->userName;
	return [
		'username'       => strtolower($userName),
		'email'          => $faker->unique()->safeEmail,
		'password'       => bcrypt('123'),
		'remember_token' => str_random(10),

		// 'email_verified_at' => now(),
	];
});
