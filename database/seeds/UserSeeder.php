<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User; // agrego el uso del modelo Category para hacerle consultas

class UserSeeder extends Seeder {
	public function run() {
		factory(User::class)->create([ // user prueba admin
			'email'      => 'rodo@rodo.com',
			'is_admin'   => true,

			// 'avatar'  => 'rodo.jpg'
		]);

		factory(User::class)->times(99)->create();
	}
}
