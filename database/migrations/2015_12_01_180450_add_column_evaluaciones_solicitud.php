<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEvaluacionesSolicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes', function(Blueprint $table)
        {
            $table->integer('id_evaluaciones')->nullable();
            $table->foreign('id_evaluaciones')->references('id')->on('evaluaciones')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes', function(Blueprint $table)
        {
            $table->dropColumn('id_evaluaciones');

        });
    }
}
