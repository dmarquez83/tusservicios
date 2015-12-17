<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InsumoSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $solicitudes = DB::table('solicitudes')->get();
        $faker = Faker::create('es_VE');
        foreach ($solicitudes as $solicitud) {

            $cantidad =  $faker->numberBetween($min = 0, $max = 4);

            if($cantidad > 0) {

                for ($i = 1; $i < $cantidad; $i ++) {

                    $date = $faker->dateTimeThisYear();
                    \DB::table('insumos_solicitudes')->insert(array(
                      'solicitud_id' => $solicitud->id,
                      'insumo_id' => $faker->numberBetween($min = 1, $max = 30),
                      'created_at' => $date,
                      'updated_at' => $date,

                    ));
                }

            }

        }
    }
}
