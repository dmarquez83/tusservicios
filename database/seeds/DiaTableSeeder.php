<?php

use Illuminate\Database\Seeder;
use App\Models\Dias;
use Faker\Factory as Faker;

class DiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_VE');
        $date = $faker->dateTimeThisYear();
        $data = array(
            [
                'dia' => 'Lunes',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'dia' => 'Martes',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'dia' => 'Miercoles',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'dia' => 'Jueves',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'dia' => 'Viernes',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'dia' => 'Sabado',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'dia' => 'Domingo',
                'created_at' => $date,
                'updated_at' => $date,

            ]
        );

        Dias::insert($data);
    }
}
