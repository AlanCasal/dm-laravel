<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // agrego el uso del modelo Category para hacerle consultas

class UserSeeder extends Seeder
{
	public function run()
	{
		factory(User::class)->create([
			'username' => 'adcasal',
			'email'    => 'adcasal@dragonmarket.com.ar',
			'password' => bcrypt('123123'),
			'is_admin' => true,
		]);

		factory(User::class)->times(3)->create();
	}
}
