<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicCategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('modulos.categorias.public.index')->with('categorias', $categorias);
    }

    /**
     * Display the specified Solicitudes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        $servicios = \DB::table('servicios')
            ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
            ->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
            ->where('categorias.id','=',$categoria->id)
            ->select('servicios.*')
            ->get();

        return view('modulos.categorias.public.show')->with(
            array(
                'categoria' => $categoria,
                'servicios' => $servicios
            )
        );
    }
}
