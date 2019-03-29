<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product; // agrego el uso del modelo Product para hacerle consultas

class ProductSeeder extends Seeder {
    private $i = 'products'; // el índice adentro del cual están los productos

    public function productsList($i) { // json[productos]
        $archivo = storage_path() . '/products.json'; // busco el json con los datos de los productos. storage_path() se para en la carpeta storage
        $products = json_decode(file_get_contents($archivo), true); // decodeo y convierto en array asociativo
        return $products[$i]; // devuelvo array asociativo
    }

    public function run() {
        foreach ($this->productsList($this->i) as $product => $column) { // foreacheo el array asociativo que traigo decodeado del json
            Product::create([ // inserto la data usando eloquent (protip: eloquent usa los timestamps, otros métodos no)
                'name'        => $column['description'],
                'category_id' => $column['category_id'],
                'price'       => $column['price']
            ]);
        }
    }
}
