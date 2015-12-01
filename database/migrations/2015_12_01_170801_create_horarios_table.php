<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('usuario_servicio_id')->unsigned();
			$table->foreign('usuario_servicio_id')->references('id')->on('usuarios_servicios')->onDelete('cascade');
			$table->integer('hora_id');
			$table->foreign('hora_id')->references('id')->on('horas')->onDelete('cascade');
			$table->integer('dia_id');
			$table->foreign('dia_id')->references('id')->on('dias')->onDelete('cascade');
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
		Schema::drop('horarios');
	}

}
