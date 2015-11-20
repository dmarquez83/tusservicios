<?php

use Illuminate\Database\Seeder;
use App\Models\Evaluaciones;

class EvaluacionesTableSeeder extends Seeder
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
            'nombre' => 'Malo',
            'valor' => '1',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Regular',
            'valor' => '2',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Bueno Bajo',
            'valor' => '3',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Bueno Alto',
            'valor' => '4',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ],
          [
            'nombre' => 'Excelente',
            'valor' => '5',
            'created_at' => new DateTime,
            'updated_at' => new Datetime,
          ]
        );

        Evaluaciones::insert($data);
    }
}
