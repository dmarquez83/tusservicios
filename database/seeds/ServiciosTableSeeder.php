<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Tiposervicio;
use App\Models\Servicios;
use Illuminate\Support\Facades\DB;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $servicios = Tiposervicio::orderBy('id_categoria', 'asc');
        $servicios = DB::table('tiposervicios')
          ->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
          ->select('tiposervicios.id as id','tiposervicios.nombre','categorias.nombre as categoria')
          ->get();
        foreach ($servicios as $serv) {
            \DB::table('servicios')->insert(array(
              'nombre' => $serv->categoria . ' ' . $serv->nombre . ' ' . $serv->id,
              'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam modi autem',
              'foto' => 'servicios.jpg',
              'id_tipo_servicio' => $serv->id,
              'id_estatus' => '1',
              'ponderacion' => '1'

            ));

        }
    }
}