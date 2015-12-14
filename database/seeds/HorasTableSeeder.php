<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\horas;


class horasTableSeeder extends Seeder
{

  public function run() {

    $data = array(
      [
        'hora' => '08:00am - 12:00pm',

      ],
      [
        'hora' => '01:00pm - 05:00pm',

      ],
      [
        'hora' => '08:00am - 10:00pm',

      ],
      [
          'hora' => '02:00am - 04:00pm',

      ],
      [
          'hora' => '01:00am - 06:00pm',

      ]
    );

    horas::insert($data);
  }
}