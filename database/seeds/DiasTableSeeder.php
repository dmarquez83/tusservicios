<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dias;


class DiasTableSeeder extends Seeder
{

  public function run() {

    $data = array(
      [
        'dia' => 'Lunes',

      ],
      [
        'dia' => 'Martes',

      ],
      [
        'dia' => 'Miercoles',

      ],
      [
          'dia' => 'Jueves',

      ],
      [
          'dia' => 'Viernes',

      ],
      [
          'dia' => 'Sabado',

      ],
      [
          'dia' => 'Domingo',

      ]
    );

    Dias::insert($data);
  }
}