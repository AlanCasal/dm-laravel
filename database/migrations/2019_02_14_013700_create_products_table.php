<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->boolean('active')->default(true);
			$table->boolean('stock')->default(true);
			
			// $table->string('image', 50); // hasta 50 caracteres
			$table->string('description', 75); // hasta 75 caracteres
			$table->decimal('price', 8, 2); // 8 enteros, 2 decimales

	        $table->integer('category_id')->unsigned(); // en la clave foranea tiene que ir un unsigned para que no se rompa
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // establezco la relación de la clave foranea
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}
}
