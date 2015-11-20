<?php

use Illuminate\Database\Seeder;
use App\Models\Ponderacion;

class PonderacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
          [
            'nombre' => 'Bajo',
            'valor' => '1',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Medio',
            'valor' => '2',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Alto',
            'valor' => '3',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ]
        );
        Ponderacion::insert($data);
    }
}
