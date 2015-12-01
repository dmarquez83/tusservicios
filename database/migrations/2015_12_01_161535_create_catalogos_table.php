<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion');
			$table->integer('solicitud_id')->unsigned();
			$table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');
			$table->integer('estatus_id')->unsigned();
			$table->foreign('estatus_id')->references('id')->on('estatus')->onDelete('cascade');
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
		Schema::drop('catalogos');
	}

}
