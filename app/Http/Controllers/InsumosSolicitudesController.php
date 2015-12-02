<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Libraries\Repositories\InsumosSolicitudesRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\InsumosServicios;
use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Servicios;





class InsumosSolicitudesController extends AppBaseController
{

	/** @var  InsumosSolicitudesRepository */
	private $insumosSolicitudesRepository;


	function __construct(InsumosSolicitudesRepository $insumosSolicitudes)
	{

		$this->insumosSolicitudesRepository = $insumosSolicitudes;
	}

	/**
	 * Display a listing of the InsumosSolicitudes.
	 *
	 * @return Response
	 */
	public function detalle(Request $request)
	{

	  $insumos = Insumo::join('insumos_servicios','insumos_servicios.insumo_id','=','insumos.id')
		                ->where('insumos_servicios.servicio_id','=','1')
		                ->orderBy('insumos.id', 'DESC')->paginate(10);

	 /* $insumos = InsumosServicios::with('insumos')->where('servicio_id', '1')->get();*/

	 // dd($insumos);

	 // return response()->json($insumos);

	  return $insumos->toJson();

	 // return json_encode($insumos);




	}


}
