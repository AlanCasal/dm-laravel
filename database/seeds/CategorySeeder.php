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
        'PCS ARMADAS',
        'FUENTES',
        'PLACAS DE VIDEO',
        'MEMORIAS RAM',
        'MOTHERBOARDS',
        'PROCESADORES',
        'GABINETES',
        'MONITORES'
    );
}
