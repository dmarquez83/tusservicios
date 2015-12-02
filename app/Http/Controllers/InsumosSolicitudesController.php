<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateInsumosSolicitudesRequest;
use App\Http\Requests\UpdateInsumosSolicitudesRequest;
use App\Libraries\Repositories\InsumosSolicitudesRepository;
use App\Libraries\Repositories\InsumoRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Insumo;

use Illuminate\Http\Request;



class InsumosSolicitudesController extends AppBaseController
{

	/** @var  InsumosSolicitudesRepository */
	private $insumosSolicitudesRepository;
    private $insumoRepository;

	function __construct(InsumosSolicitudesRepository $insumosSolicitudes, InsumoRepository $insumoRepo)
	{
		$this->insumoRepository = $insumoRepo;
		$this->insumosSolicitudesRepository = $insumosSolicitudes;
	}

	/**
	 * Display a listing of the InsumosSolicitudes.
	 *
	 * @return Response
	 */
	public function detalle()
	{

	  $insumos = $this->insumoRepository->paginate(10);
      //dd($insumos);
	  return json_encode($insumos);

	 /* return view('insumosSolicitudes.index')
			->with('insumosSolicitudes', $insumos);*/
	}

	/**
	 * Show the form for creating a new InsumosSolicitudes.
	 *
	 * @return Response
	 */

}
