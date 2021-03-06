<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('codmun');
			$table->string('nommun');
			$table->integer('codest')->unsigned();
			$table->foreign('codest')->references('id')->on('estados')->onDelete('cascade');
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
		Schema::drop('municipios');
	}

}
