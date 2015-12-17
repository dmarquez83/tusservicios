<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosSolicitudesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insumos_solicitudes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('insumo_id')->unsigned();
			$table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
			$table->integer('solicitud_id')->unsigned();
			$table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');
			$table->timestamps();
		  //composer dump-autoload -o
		  //php artisan migrate
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('insumos_solicitudes');
	}

}
