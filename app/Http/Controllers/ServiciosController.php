<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateServiciosRequest;
use App\Http\Requests\UpdateServiciosRequest;
use App\Libraries\Repositories\ServiciosRepository;
use App\Models\Ponderacion;
use App\Models\Servicios;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Tiposervicio;
use App\Models\Estatu;
use Illuminate\Support\Facades\DB;

class ServiciosController extends AppBaseController
{

	/** @var  ServiciosRepository */
	private $serviciosRepository;

	function __construct(ServiciosRepository $serviciosRepo)
	{
		$this->serviciosRepository = $serviciosRepo;
	}

	/**
	 * Display a listing of the Servicios.
	 *
	 * @return Response
	 */
	public function index()
	{
		$servicios = $this->serviciosRepository->paginate(10);

		/*$servicios = Servicios::join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
			->orderBy('servicios.id', 'asc')
			->lists('servicios.nombre', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','servicios.id_estatus','servicios.ponderacion');*/

		/*$servicios = DB::table('servicios')
        ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
		->join('estatus','estatus.id' ,'=','servicios.id_estatus')
		->join('ponderacions','ponderacions.id' ,'=','servicios.ponderacion')
        ->select('servicios.nombre', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','estatus.nombre as nombre_estatus','ponderacions.nombre as nombre_ponderacion')
        ->get();
*/

		return view('servicios.index')
			->with('servicios', $servicios);
	}

	/**
	 * Show the form for creating a new Servicios.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*ojo aqui debe venir la categoria para seleccionar el tipo de servicio*/

		$tiposervicios = Tiposervicio::where('id_categoria','6')->orderBy('id', 'asc')->lists('nombre', 'id');

		$estatu = Estatu::where('tabla','servicios')->orderBy('id', 'asc')->lists('nombre', 'id');

		$ponderacion = Ponderacion::orderBy('id', 'asc')->lists('nombre','valor', 'id');

		//$email = DB::table('users')->where('name', 'John')->value('email');

		return view('servicios.create', compact('tiposervicios','estatu','ponderacion'));
	}

	/**
	 * Store a newly created Servicios in storage.
	 *
	 * @param CreateServiciosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateServiciosRequest $request)
	{
		$input = $request->all();

		$servicios = $this->serviciosRepository->create($input);

		Flash::success('Servicios saved successfully.');

		return redirect(route('servicios.index'));
	}

	/**
	 * Display the specified Servicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{



		$servicios = $this->serviciosRepository->find($id);


		if(empty($servicios))
		{
			Flash::error('Servicios not found');

			return redirect(route('servicios.index'));
		}

		return view('servicios.show')->with('servicios', $servicios);
	}

	/**
	 * Show the form for editing the specified Servicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		/* */
		$servicios = $this->serviciosRepository->find($id);

		$tiposervicios = Tiposervicio::where('id_categoria','6')->orderBy('id', 'asc')->lists('nombre', 'id');

		$estatu = Estatu::where('tabla','servicios')->orderBy('id', 'asc')->lists('nombre', 'id');

		$ponderacion = Ponderacion::orderBy('id', 'asc')->lists('nombre','valor', 'id');

		if(empty($servicios))
		{
			Flash::error('Servicios not found');

			return redirect(route('servicios.index'));
		}

		return view('servicios.edit',compact('servicios','tiposervicios','estatu','ponderacion'));
	}

	/**
	 * Update the specified Servicios in storage.
	 *
	 * @param  int              $id
	 * @param UpdateServiciosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateServiciosRequest $request)
	{
		$servicios = $this->serviciosRepository->find($id);

		if(empty($servicios))
		{
			Flash::error('Servicios not found');

			return redirect(route('servicios.index'));
		}

		$servicios = $this->serviciosRepository->updateRich($request->all(), $id);

		Flash::success('Servicios updated successfully.');

		return redirect(route('servicios.index'));
	}

	/**
	 * Remove the specified Servicios from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$servicios = $this->serviciosRepository->find($id);

		if(empty($servicios))
		{
			Flash::error('Servicios not found');

			return redirect(route('servicios.index'));
		}

		$this->serviciosRepository->delete($id);

		Flash::success('Servicios deleted successfully.');

		return redirect(route('servicios.index'));
	}
}
