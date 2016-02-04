<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Models\Horas;

class HoraTableSeeder extends Seeder
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
                'hora' => '08:00am - 12:00pm',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'hora' => '01:00pm - 05:00pm',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'hora' => '08:00am - 10:00pm',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'hora' => '02:00am - 04:00pm',
                'created_at' => $date,
                'updated_at' => $date,

            ],
            [
                'hora' => '01:00am - 06:00pm',
                'created_at' => $date,
                'updated_at' => $date,

            ]
        );

//        horas::insert($data);
          Horas::insert($data);
    }
}
