<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servicios;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function categorias(Request $request) {

      $search = $request->get('search');

      $categorias = Categoria::search($search)->orderBy('created_at', 'DESC')->paginate(10);

      return view('solicitudes.index')->with('categorias', $categorias);
    }

    public function servicios(Request $request, $id) {

        $search = $request->get('search');

        $servicios = Servicios::search($search,['nombre', 'descripcion'])
            ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
            ->where('tiposervicios.id_categoria','=',$id)
            ->orderBy('servicios.id', 'DESC')->paginate(10);

        return view('solicitudes.indexservicios')->with('servicios', $servicios);
    }
}
