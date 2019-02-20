<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

	public function run()
	{
		// agregar acá todas las tablas a truncar
		$this->truncateTables([ 'categories', 'products', 'users' ]);

		// agregar acá todas las tablas a llenar con datos
		$this->call(UserSeeder    ::class);
		$this->call(CategorySeeder::class);
		$this->call(ProductSeeder ::class);
	}

	protected function truncateTables(array $tables)
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		foreach ($tables as $table)
			DB::table($table)->truncate();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}
