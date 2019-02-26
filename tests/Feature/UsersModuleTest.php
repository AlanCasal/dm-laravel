<?php
namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UsersModuleTest extends TestCase
{
	use RefreshDatabase;

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

	private $i = 'products'; // el índice adentro del cual están los productos
	public function productsList($i) { // json[productos]
		$archivo = storage_path() . '/products.json'; // busco el json con los datos de los productos. storage_path() se para en la carpeta storage
		$products = json_decode(file_get_contents($archivo), true); // decodeo y convierto en array asociativo
		return $products[$i]; // devuelvo array asociativo
	}

	protected function truncateTables(array $tables)
	{
		\DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		foreach ($tables as $table)
			\DB::table($table)->truncate();

		\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

	/** @test */
	public function homeTest()
	{
		$this->truncateTables([ 'categories', 'products']);

		foreach ($this->categories as $category)
			factory(Category::class)->create(['name' => $category]);

		foreach ($this->productsList($this->i) as $product => $column) { // foreacheo del array asociativo que traigo decodeado del json
			factory(Product::class)->create([
				'description' => $column['description'],
				'category_id' => $column['category_id'],
				'price'       => $column['price']
			]);
		}

		$this->get('/')
			->assertStatus(200);
	}

}
