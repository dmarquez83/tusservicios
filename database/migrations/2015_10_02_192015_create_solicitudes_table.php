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
			$table->string('descripcion');
			$table->date('fecha');
			$table->string('hora');
			$table->string('direccion');
			$table->string('telefono');
			$table->string('horas');
			$table->float('costo',12,2);
			$table->integer('id_usuario');
			$table->integer('id_estatus');
			$table->integer('id_servicio');
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
