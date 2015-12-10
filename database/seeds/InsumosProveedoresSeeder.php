<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InsumosProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $proveedores = DB::table('proveedores')->get();
        $faker = Faker::create('es_VE');
        foreach ($proveedores as $proveedor) {

            $cantidad =  $faker->numberBetween($min = 1, $max = 30);

            for ($i = 1; $i < $cantidad; $i ++) {
                $date = $faker->dateTimeThisYear();
                \DB::table('proveedores_insumos')->insert(array(
                  'proveedor_id' => $proveedor->id,
                  'insumo_id' => $i,
                  'created_at' => $date,
                  'updated_at' => $date,

                ));
            }

        }
    }
}
