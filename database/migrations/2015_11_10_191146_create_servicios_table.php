<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('descripcion');
		    $table->string('foto')->nullable();
		    $table->integer('id_tipo_servicio')->unsigned();
		    $table->foreign('id_tipo_servicio')->references('id')->on('tiposervicios')->onDelete('cascade');
		    $table->integer('id_estatus')->unsigned();
		    $table->foreign('id_estatus')->references('id')->on('estatus')->onDelete('cascade');
			$table->integer('ponderacion');
		    $table->foreign('ponderacion')->references('id')->on('ponderaciones')->onDelete('cascade');
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
		Schema::drop('servicios');
	}

}
