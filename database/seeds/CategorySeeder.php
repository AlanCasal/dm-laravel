<?php

use App\Models\Category; // use App\Category as Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
	public function run()
	{
		foreach ($this->categories as $category)
			Category::create([ 'name' => $category ]);
	}

	protected $categories = array(
		'MEMORIAS',
        'PLACAS DE VIDEO',
        'DISCOS RÍGIDOS',
        'MICRO PROCESADORES',
        'SOFTWARE',
        'GABINETES',
        'EQUIPO ARMADO',
        'MONITORES',
        'MOTHERBOARD',
        'PLACAS DE SONIDO',
        'MOUSE / TECLADOS',
        'FUENTES DE ALIMENTACIÓN'
	);
}
