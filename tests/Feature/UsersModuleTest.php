<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{

	/** @test */
	function la_ruta()
	{
		$this->get('/users')
		->assertStatus(200)
		->assertSee("SOY LA COSA")
		// $this->assertTrue(true);
	}
}
