<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class UsersModuleTest extends TestCase
{
    // migra la DB y ejecuta los tests dentro de una transacción de la DB. Para usar una DB alterna a la original al hacer Tests
    use RefreshDatabase;
 
	/** @test */
	public function homeTest()
	{
		$this->get('/')
			->assertStatus(200);
	}
}
