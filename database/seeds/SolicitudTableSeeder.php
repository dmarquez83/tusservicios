<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;


class SolicitudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('es_VE');
        for ($i = 1; $i < 30; $i ++) {
            $date = $faker->dateTimeThisYear();
            \DB::table('solicitudes')->insert(array(
              'descripcion' => $faker->text($maxNbChars = 200) ,
              'hora' => $faker->time($format = 'H:i:s', $max = 'now'),
              'fecha' => $faker->date(),
              'direccion' => $faker->address(),
              'telefono' =>  $faker->phoneNumber(),
              'horas' => $faker->name(),
              'costo' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
              'id_usuario' =>  $faker->numberBetween($min = 1, $max = 3) ,
              'id_estatus' => 3,
              'id_servicio' => $i,
              'created_at' => $date,
              'updated_at' => $date,
            ));
        }
    }
}
