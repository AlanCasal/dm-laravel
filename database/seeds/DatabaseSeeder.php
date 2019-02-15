<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->truncateTables([ // agregar acá todas las tablas a truncar
            'categories'
        ]);

        $this->call(CategorySeeder::class); // agregar acá todas las tablas a llenar con datos
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($tables as $table)
            DB::table($table)->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
