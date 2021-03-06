<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proveedores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('rif');
			$table->string('nombre');
			$table->string('telefono')->nullable();
			$table->string('direccion')->nullable();
			$table->string('rnc')->nullable();
			$table->string('correo');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proveedores');
	}

}
