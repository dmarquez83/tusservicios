<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogosInsumosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogos_insumos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('descripcion');
			$table->integer('proveedor_id')->unsigned();
			$table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
			$table->integer('insumo_id')->unsigned();
			$table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
			$table->integer('estatus_id')->unsigned();
			$table->foreign('estatus_id')->references('id')->on('estatus')->onDelete('cascade');
			$table->integer('catalogo_id')->unsigned();
			$table->foreign('catalogo_id')->references('id')->on('catalogos')->onDelete('cascade');
			$table->decimal('precio')->unsigned();
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
		Schema::drop('catalogos_insumos');
	}

}
