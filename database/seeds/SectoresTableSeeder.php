<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use App\Models\Ciudad;

class SectoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_VE');
        $ciudades = DB::table('ciudades')->get();
        foreach ($ciudades as $ciudad) {
            for ($i = 0; $i < 5; $i++) {
                $date = $faker->dateTimeThisYear();
                \DB::table('sectores')->insert(array(
                    'nombre' => $faker->city(),
                    'ciudad_id' => $ciudad->id,
                    'created_at' => $date,
                    'updated_at' => $date,
                ));
            }
        }
    }
}
