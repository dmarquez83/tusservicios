<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Insumo;
use App\Models\Servicios;





class InsumosSolicitudesController  extends Controller
{


	public function detalle(Request $request)
	{

	 /* $insumos = Insumo::join('insumos_servicios','insumos_servicios.insumo_id','=','insumos.id')
		                ->where('insumos_servicios.servicio_id','=','1')
		                ->orderBy('insumos.id', 'DESC')->paginate(10);*/

	  $insumos = Insumo::with('insumos_servicios')->where('id', '1')->get();

	 // dd($insumos);

	 // return response()->json($insumos);

	 // return $insumos->toJson();

	  return json_encode($insumos);




	}


}
