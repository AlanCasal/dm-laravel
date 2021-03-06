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

	$username = strtolower($faker->username);
	$email = "{$username}@dragonmarket.com.ar";

	return [
		'username'       => $username,
		'email'          => $email,
		'password'       => bcrypt('123123'),
		// 'email_verified_at' => now(),
	];
});
