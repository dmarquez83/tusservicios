<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposerviciosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tiposervicios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre')->nullable();
			$table->string('descripcion')->nullable();
		    $table->integer('id_categoria')->unsigned()->nullable();
		    $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
		    $table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tiposervicios');
	}

}
