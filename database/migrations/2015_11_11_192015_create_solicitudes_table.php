<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion')->nullable();
			$table->date('fecha');
			$table->string('hora');
			$table->string('direccion');
			$table->string('telefono');
			$table->string('horas')->nullable();
			$table->float('costo',12,2)->nullable();
		    $table->integer('id_usuario');
		    $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
		    $table->integer('id_estatus');
		    $table->foreign('id_estatus')->references('id')->on('estatus')->onDelete('cascade');
		    $table->integer('id_servicio');
		    $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade');
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
		Schema::drop('solicitudes');
	}

}
