<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugaresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('usuario_servicio_id')->unsigned();
            $table->foreign('usuario_servicio_id')->references('id')->on('usuarios_servicios')->onDelete('cascade');
            $table->integer('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectores')->onDelete('cascade');
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
        Schema::drop('lugares');
    }

}
