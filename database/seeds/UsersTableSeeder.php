<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;


class UsersTableSeeder extends Seeder
{

  public function run() {

    $data = array(
      [
        'name' => 'administrador',
        'email' => 'administrador@gmail.com',
        'password' => bcrypt('123456'),
        'id_tipo_usuario' => '1',
      ],
      [
        'name' => 'usuario',
        'email' => 'usuario@gmail.com',
        'password' => bcrypt('123456'),
        'id_tipo_usuario' => '1',
      ]
    );

    User::insert($data);
  }
}