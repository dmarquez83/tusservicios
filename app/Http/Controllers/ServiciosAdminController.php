<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateServiciosRequest;
use App\Http\Requests\UpdateServiciosRequest;

use App\Libraries\Repositories\ServiciosRepository;
use App\Libraries\Repositories\CategoriaRepository;
use App\Libraries\Repositories\TiposervicioRepository;
use App\Libraries\Repositories\PonderacionRepository;
use App\Libraries\Repositories\EstatuRepository;


use Flash;
use Response;
use Mitul\Controller\AppBaseController as AppBaseController;

use Illuminate\Support\Collection as Collection;


use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\DB;

use App\Models\Ponderacion;
use App\Models\Servicios;
use App\Models\Tiposervicio;
use App\Models\Estatu;
use App\Models\Categoria;


class ServiciosAdminController extends AppBaseController
{

	/** @var  ServiciosRepository */
	private $serviciosRepository;

	function __construct(ServiciosRepository $serviciosRepo,  CategoriaRepository $categoriaRepo, EstatuRepository $estatuRepo, PonderacionRepository $ponderacionRepo, TiposervicioRepository $tiposervicioRepo)
	{
		$this->serviciosRepository = $serviciosRepo;

		$this->categoriaRepository = $categoriaRepo;

		$this->estatuRepository = $estatuRepo;

		$this->ponderacionRepository = $ponderacionRepo;

		$this->tiposervicioRepository = $tiposervicioRepo;
	}

	/**
	 * Display a listing of the Servicios.
	 *
	 * @return Response
	 */
	public function index()
	{

		$servicios1 = DB::table('servicios')
			->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
			->join('estatus','estatus.id' ,'=','servicios.id_estatus')
			->join('ponderaciones','ponderaciones.id' ,'=','servicios.ponderacion')
			->select('servicios.nombre','servicios.foto', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','estatus.nombre as nombre_estatus','ponderaciones.nombre as nombre_ponderacion')
			->get();

		//este query de devuelve un arreglo lo convierto en una collection para enviarselo a la vista

		$servicios = Collection::make($servicios1);

		//dd($servicios);

		//return response()->json($servicios);


		return view('servicios.indexservicios')->with('servicios', $servicios);
	}



	/**
	 * Show the form for editing the specified Tiposervicio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function create($id)
	{

		//return $id;
		//$tiposervicios = $this->tiposervicioRepository->all();

		$tiposervicios = Tiposervicio::where('id_categoria',$id)->orderBy('id', 'asc')->lists('nombre', 'id');

		//dd($tiposervicios);

		$estatu = Estatu::where('tabla','servicios')->orderBy('id', 'asc')->lists('nombre', 'id');

		$ponderacion = Ponderacion::orderBy('id', 'asc')->lists('nombre','valor', 'id');


		return view('servicios.create', compact('tiposervicios','estatu','ponderacion'));
	}

	/**
	 * Store a newly created Servicios in storage.
	 *
	 * @param CreateServiciosRequest $request
	 *
	 * @return Response
	 */


}
