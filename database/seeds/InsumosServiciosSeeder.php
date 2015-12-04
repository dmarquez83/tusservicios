<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InsumosServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $servicios = Tiposervicio::orderBy('id_categoria', 'asc');
        $servicios = DB::table('servicios')->get();
        $faker = Faker::create('es_VE');
        foreach ($servicios as $serv) {

            for ($i = 1; $i < 5; $i ++) {
                $date = $faker->dateTimeThisYear();
                \DB::table('insumos_servicios')->insert(array(
                  'insumo_id' => $i,
                  'servicio_id' => $serv->id,
                  'created_at' => $date,
                  'updated_at' => $date,

                ));
            }

        }
    }
}
