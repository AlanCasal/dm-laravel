<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {

	  // automáticos
      $table->increments('id');
      $table->timestamps();
      $table->rememberToken();

	  // default
      $table->boolean('is_admin')->default(false);

	  // datos a completar
	  $table->string('first_name');
      $table->string('last_name');
      $table->string('email')->unique();
      $table->string('password');
      $table->string('avatar')->default('public/img/default.jpg');

	  // carrito de compras
	  // $table->integer('cart_id')->unsigned(); // en la clave foranea tiene que ir un unsigned para que no se rompa
      // $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade'); // establezco la relacion de la clave foreanea.
    });
  }

  public function down() {
    Schema::dropIfExists('users');
  }
}
