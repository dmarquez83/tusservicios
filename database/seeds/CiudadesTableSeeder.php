<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CiudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_VE');
        for ($i = 0; $i < 24; $i ++) {
            $date = $faker->dateTimeThisYear();
            \DB::table('ciudades')->insert(array(
                'nombre' => $faker->state(),
                'created_at' => $date,
                'updated_at' => $date,
            ));
        }
    }
}
