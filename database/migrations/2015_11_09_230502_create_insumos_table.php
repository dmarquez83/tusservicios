<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insumos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion')->nullable();
			$table->string('referencia')->nullable();
		    $table->string('foto')->nullable();
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
		Schema::drop('insumos');
	}

}
