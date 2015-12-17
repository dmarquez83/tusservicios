<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosFotosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insumos_fotos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('insumo_id')->unsigned();
			$table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
			$table->string('foto');
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
		Schema::drop('insumos_fotos');
	}

}
