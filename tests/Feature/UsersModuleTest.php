<?php
namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class UsersModuleTest extends TestCase
{
	// migra la DB y ejecuta los tests dentro de una transacción de la DB. Para usar una DB alterna a la original al hacer Tests
//	use RefreshDatabase;
	
	/** @test */
	public function homeTest()
	{
		
		$this->truncateTables([ 'categories', 'products']);
		
		foreach ($this->categories as $category)
			factory(Category::class)->create(['name' => $category]);
		
		foreach ($this->productsList($this->i) as $product => $column) { // foreacheo el array asociativo que traigo decodeado del json
			factory(Product::class)->create([ // inserto la data usando eloquent (protip: eloquent usa los timestamps, otros métodos no)
				'description' => $column['description'],
				'category_id' => $column['category_id'],
				'price'       => $column['price']
			]);
		}
		
		
		$this->get('/')
			->assertStatus(200);
//			->assertSee('acá se estaría mostrando todo, no?');
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
	
	private $i = 'products'; // el indice adentro del cual están los productos
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
}