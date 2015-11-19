<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tipousuarios;


class TipoUsuarioTableSeeder extends Seeder
{

  public function run() {

    $data = array(
      [
        'nombre' => 'administrador',
        'descripcion' => 'administrador',
        'abreviatura' => 'admin',
      ],
      [
        'nombre' => 'usuario',
        'descripcion' => 'usuario',
        'abreviatura' => 'users',
      ]
    );

    Tipousuarios::insert($data);
  }
}
