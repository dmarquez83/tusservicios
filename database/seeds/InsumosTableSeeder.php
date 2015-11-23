<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use App\Models\Insumo;

class InsumosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_VE');
        for ($i = 0; $i < 30; $i ++) {
            $date = $faker->dateTimeThisYear();
            \DB::table('insumos')->insert(array(
              'descripcion' => $faker->text($maxNbChars = 200),
              'referencia' => $faker->word(),
              'foto' => 'images.jpeg',
              'created_at' => $date,
              'updated_at' => $date,
            ));
        }
    }
}
