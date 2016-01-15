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
        'created_at' => new DateTime,
        'updated_at' => new Datetime,
      ],
      [
        'nombre' => 'usuario',
        'descripcion' => 'usuario',
        'abreviatura' => 'users',
        'created_at' => new DateTime,
        'updated_at' => new Datetime,
      ],
      [
        'nombre' => 'consultor',
        'descripcion' => 'consultor',
        'abreviatura' => 'consul',
        'created_at' => new DateTime,
        'updated_at' => new Datetime,
      ],
      [
        'nombre' => 'cliente',
        'descripcion' => 'cliente',
        'abreviatura' => 'clit',
        'created_at' => new DateTime,
        'updated_at' => new Datetime,
      ]
    );

    Tipousuarios::insert($data);
  }
}
