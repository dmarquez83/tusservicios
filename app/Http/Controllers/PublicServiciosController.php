<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicServiciosController extends Controller
{
    public function index()
    {

        $servicios = Servicios::all();

        return view('modulos.servicios.public.index')->with('servicios', $servicios);

    }

    public function show($id){
        //$servicios = $this->serviciosRepository->find($id);

        $servicios = \DB::table('servicios')
            ->join('tiposServicio','tiposServicio.id' ,'=','servicios.id_tipo_servicio')
            ->join('estatus','estatus.id' ,'=','servicios.id_estatus')
            ->join('ponderaciones','ponderaciones.id' ,'=','servicios.ponderacion')
            ->select('servicios.nombre','servicios.foto', 'servicios.id','servicios.descripcion','tiposServicio.nombre as nombre_tipo_servicio','estatus.nombre as nombre_estatus','ponderaciones.nombre as nombre_ponderacion')
            ->where('servicios.id','=',$id)
            ->get();


        //$servicios = Servicios::findOrFail($id);

        if(empty($servicios))
        {
            Flash::error('Servicios not found');

            return redirect(route('servicios.index',$id));
        }

        return view('modulos.servicios.public.show')->with('servicios', $servicios);
    }

}
