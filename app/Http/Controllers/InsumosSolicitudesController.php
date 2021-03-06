<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Insumo;
use App\Models\Servicios;



class InsumosSolicitudesController  extends Controller
{

  public function __construct()
  {
	if(!\Session::has('solinsumos')) \Session::put('solinsumos', array());
  }


	public function detalle(Request $request)
	{


	  $insumos = Insumo::with('insumos_servicios')->join('insumos_servicios','insumos_servicios.insumo_id','=','insumos.id')
		->where('insumos_servicios.servicio_id','=',$request->get('id_servicio'))
		->orderBy('insumos.id', 'DESC')->get();

	 // dd($insumos);

	 // return response()->json($insumos);

	 // return $insumos->toJson();

	  return json_encode($insumos);

	}

	public function getGuardar(Request $request)
	{
	     // dd($request);
	    \Session::put('solinsumos', $request->insumo);
	    $solinsumos = \Session::get('solinsumos');
	  //   return  $solinsumos; //return \Session::get('solinsumos');

	  return json_encode($solinsumos);

	}

}
