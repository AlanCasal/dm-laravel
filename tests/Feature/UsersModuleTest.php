<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
    public function productsList($i)
    {
    	// json[productos]
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
        $this->truncateTables(['categories', 'products']);
        
        foreach ($this->categories as $category)
            factory(Category::class)->create(['name' => $category]);
        
        foreach ($this->productsList($this->i) as $product => $column) { // foreacheo del array asociativo que traigo decodeado del json
            factory(Product::class)->create([
                'description' => $column['description'],
                'category_id' => $column['category_id'],
                'price' => $column['price']
            ]);
        }
        
        $this->get('/')
            ->assertStatus(200);
    }
    
    /** @test */
    public function error_404_findOrFail()
    {
        $this->get('/users/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }
    
    /** @test */
    public function new_user_page()
    {
        $this->get('users/create')
            ->assertStatus(200);
    }
    
    /** @test */
    public function new_user()
    {
        $this->withoutExceptionHandling();
    
        $this->post('/users/create', [
            'first_name' => 'Naty',
            'last_name' => 'The Starfish',
            'email' => 'naty@thestarfish.com',
            'password' => 123456,
        ])->assertRedirect(route('users.index'));
        
        $this->assertCredentials([
            'first_name' => 'Naty',
            'last_name' => 'The Starfish',
            'email' => 'naty@thestarfish.com',
            'password' => 123456,
            'avatar' => 'public/img/default.jpg'
        ]);
    }

	/** @test */
	public function first_name_is_required()
	{
		//$this->withoutExceptionHandling();

		$this->from(route('users.create'))
			->post(route('users.create'), [
				'first_name' => '',
				'last_name' => 'Rodo',
				'email' => 'rodo@rodo.com',
				'password' => 123456,
			])
			->assertRedirect(route('users.create'))
			->assertSessionHasErrors([ 'first_name' => 'Por favor ingresá tu nombre'
			]); // error al no recibir nombre

		//$this->assertEquals(0, User::count()); // espera 0 users creados, cuenta los users en la db
		//$this->assertDatabaseMissing('users', [
		//	'email' => 'rodo@rodo.com'
		//]);
	}

	/** @test */
	public function email_is_required()
	{
		//$this->withoutExceptionHandling();

		$this->from(route('users.create'))
			->post(route('users.create'), [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => '',
				'password' => 123456,
			])
			->assertRedirect(route('users.create'))
			->assertSessionHasErrors([ 'email' ]); // error al no recibir email

			$this->assertEquals(0, User::count()); // espera 0 users creados, cuenta los users en la db
		//$this->assertDatabaseMissing('users', [
		//	'email' => 'rodo@rodo.com'
		//]);
	}

	/** @test */
	public function email_invalid()
	{
		//$this->withoutExceptionHandling();

		$this->from(route('users.create'))
			->post(route('users.create'), [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'emailinvalido',
				'password' => 123456,
			])
			->assertRedirect(route('users.create'))
			->assertSessionHasErrors([ 'email' ]); // error al no recibir email

		$this->assertEquals(0, User::count()); // espera 0 users creados, cuenta los users en la db
		//$this->assertDatabaseMissing('users', [
		//	'email' => 'rodo@rodo.com'
		//]);
	}

	/** @test */
	public function email_unique()
	{
		//$this->withoutExceptionHandling();

		factory(User::class)->create(['email' => 'rodo@rodo.com']);

		$this->from(route('users.create'))
			->post(route('users.create'), [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'rodo@rodo.com',
				'password' => 123456,
			])
			->assertRedirect(route('users.create'))
			->assertSessionHasErrors([ 'email' ]); // error al no recibir email

		$this->assertEquals(1, User::count()); // espera 0 users creados, cuenta los users en la db
		//$this->assertDatabaseMissing('users', [
		//	'email' => 'rodo@rodo.com'
		//]);
	}

	/** @test */
	public function password_is_required()
	{
		//$this->withoutExceptionHandling();

		$this->from(route('users.create'))
			->post(route('users.create'), [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'foxy.adc@gmail.com',
				'password' => '',
			])
			->assertRedirect(route('users.create'))
			->assertSessionHasErrors([ 'password' ]); // error al no recibir email

		$this->assertEquals(0, User::count()); // espera 0 users creados, cuenta los users en la db
		//$this->assertDatabaseMissing('users', [
		//	'email' => 'rodo@rodo.com'
		//]);
	}

	/** @test */
	public function password_length()
	{
		//$this->withoutExceptionHandling();

		$this->from(route('users.create'))
			->post(route('users.create'), [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'foxy.adc@gmail.com',
				'password' => '12345',
			])
			->assertRedirect(route('users.create'))
			->assertSessionHasErrors([ 'password' ]); // error al no recibir email

		$this->assertEquals(0, User::count()); // espera 0 users creados, cuenta los users en la db
		//$this->assertDatabaseMissing('users', [
		//	'email' => 'rodo@rodo.com'
		//]);
	}
    
    /** @test */
    public function edit_user_page()
    {
        $this->withoutExceptionHandling();
        
        $user = factory(User::class)->create();
        
        $this->get("/users/{$user->id}/edit")
	        ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Editar Usuario');
//            ->assertViewHas('user', $user);
    }

	/** @test */
	public function update_user()
	{
		$this->withoutExceptionHandling();

		$user = factory(User::class)->create();

		$this->put("/users/{$user->id}", [
			'first_name' => 'Naty',
			'last_name' => 'The Starfish',
			'email' => 'naty@thestarfish.com',
			'password' => 123456,
		])->assertRedirect("/users/{$user->id}");

		$this->assertCredentials([
			'first_name' => 'Naty',
			'last_name' => 'The Starfish',
			'email' => 'naty@thestarfish.com',
			'password' => 123456,
			//            'avatar' => 'public/img/default.jpg'
		]);
        
        $this->assertEquals(1, User::count()); // espera 1 user creado, cuenta los users en la db
    }

	/** @test */
	public function first_name_is_required_when_updating()
	{
		//$this->withoutExceptionHandling();

		$user = factory(User::class)->create();

		$this->from("/users/{$user->id}/edit")
			->put("/users/{$user->id}", [
				'first_name' => '',
				'last_name' => 'Rodo',
				'email' => 'rodo@rodo.com',
				'password' => 123456,
			])
			->assertRedirect("/users/{$user->id}/edit")
			->assertSessionHasErrors(['first_name']);

		$this->assertDatabaseMissing('users', ['email' => 'rodo@rodo.com']);
	}

	/** @test */
	public function last_name_is_required_when_updating()
	{
		//$this->withoutExceptionHandling();

		$user = factory(User::class)->create();

		$this->from("/users/{$user->id}/edit")
			->put("/users/{$user->id}", [
				'first_name' => 'Rodo',
				'last_name' => '',
				'email' => 'rodo@rodo.com',
				'password' => 123456,
			])
			->assertRedirect("/users/{$user->id}/edit")
			->assertSessionHasErrors(['last_name']);

		$this->assertDatabaseMissing('users', ['email' => 'rodo@rodo.com']);
	}

	/** @test */
	public function email_is_required_when_updating()
	{
		//$this->withoutExceptionHandling();

		$user = factory(User::class)->create();

		$this->from("/users/{$user->id}/edit")
			->put("/users/{$user->id}", [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => '',
				'password' => 123456,
			])
			->assertSessionHasErrors(['email'])
			->assertRedirect("/users/{$user->id}/edit");

		$this->assertDatabaseMissing('users', ['email' => 'rodo@rodo.com']);
	}

	/** @test */
	public function email_invalid_when_updating()
	{
		//$this->withoutExceptionHandling();

		$user = factory(User::class)->create();

		$this->from("/users/{$user->id}/edit")
			->put("/users/{$user->id}", [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'rodo',
				'password' => 123456,
			])
			->assertSessionHasErrors(['email'])
			->assertRedirect("/users/{$user->id}/edit");

		$this->assertDatabaseMissing('users', ['email' => 'rodo@rodo.com']);
	}

	/** @test */
	public function email_unique_when_updating()
	{
		self::markTestIncomplete();
		return;
		//$this->withoutExceptionHandling();

		$user = factory(User::class)->create(['email' => 'rodo@rodo.com']);

		$this->from("/users/{$user->id}/edit")
			->put("/users/{$user->id}", [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'rodo@rodo.com',
				'password' => 123456,
			])
			->assertSessionHasErrors(['email'])
			->assertRedirect("/users/{$user->id}/edit");

		$this->assertEquals(1, User::count()); // espera 1 user creado, cuenta los users en la db
	}

	/** @test */
	public function password_is_required_when_updating()
	{
		//$this->withoutExceptionHandling();

		$user = factory(User::class)->create();

		$this->from("/users/{$user->id}/edit")
			->put("/users/{$user->id}", [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'rodo@rodo.com',
				'password' => '',
			])
			->assertRedirect("/users/{$user->id}/edit")
			->assertSessionHasErrors(['password']);

		$this->assertDatabaseMissing('users', ['email' => 'rodo@rodo.com']);
	}

	/** @test */
	public function password_length_when_updating()
	{
		//$this->withoutExceptionHandling();

		$user = factory(User::class)->create();

		$this->from("/users/{$user->id}/edit")
			->put("/users/{$user->id}", [
				'first_name' => 'Rodo',
				'last_name' => 'Rodo',
				'email' => 'rodo@rodo.com',
				'password' => 12345,
			])
			->assertRedirect("/users/{$user->id}/edit")
			->assertSessionHasErrors(['password']);

		$this->assertDatabaseMissing('users', ['email' => 'rodo@rodo.com']);
	}
}
