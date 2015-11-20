<?php

use Illuminate\Database\Seeder;
use App\Models\Tiposervicio;


class TipoServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 15; $i ++) {
            $data = array(
              [
                'nombre' => 'Reparación',
                'descripcion' => 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-aperiam-modi-autem-error-dolores-doloribus-iste-libero',
                'id_categoria' => $i,
                'created_at' => new DateTime,
                'updated_at' => new Datetime,
              ],
              [
                'nombre' => 'Instalación',
                'descripcion' => 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-aperiam-modi-autem-error-dolores-doloribus-iste-libero',
                'id_categoria' => $i,
                'created_at' => new DateTime,
                'updated_at' => new Datetime,
              ],
              [
                'nombre' => 'Sustitución',
                'descripcion' => 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit-aperiam-modi-autem-error-dolores-doloribus-iste-libero',
                'id_categoria' => $i,
                'created_at' => new DateTime,
                'updated_at' => new Datetime,
              ]
            );
            Tiposervicio::insert($data);
        }


    }
}
