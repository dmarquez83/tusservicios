<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use App\Models\Proveedores;

class ProveedoresTableSeeder extends Seeder
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
            \DB::table('proveedores')->insert(array(
              'rif' => $faker->bothify('J-########-#') ,
              'nombre' => $faker->domainName(),
              'telefono' => $faker->phoneNumber(),
              'direccion' => $faker->address(),
              'rnc' =>  $faker->bothify('J-########-#') ,
              'correo' => $faker->email(),
              'created_at' => $date,
              'updated_at' => $date,
            ));
        }
    }
}
