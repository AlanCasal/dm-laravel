<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{

	/**
	 * [la_ruta_yuta description]
	 * @param  [type] $cosa [description]
	 * @return [type]       [description]
	 * @test
	 */
	function test_la_ruta_yuta($cosa)
	{
		$this->get('/users')
		->assertStatus(200)
		->assertSee('SOY LA RUTA YUTA');
		// $this->assertTrue(true);
	}

	
}
