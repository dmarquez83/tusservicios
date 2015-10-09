<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateServiciosRequest;
use App\Http\Requests\UpdateServiciosRequest;
use App\Libraries\Repositories\ServiciosRepository;

use Flash;
use Response;
use Mitul\Controller\AppBaseController as AppBaseController;


use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\DB;

use App\Models\Ponderacion;
use App\Models\Servicios;
use App\Models\Tiposervicio;
use App\Models\Estatu;

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
		$servicios = $this->serviciosRepository->paginate(9);

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
		/*ojo debe salir la opcion para que selecciona la categoria y de hay se desplegue los tipos de servicios segun la categoria*/

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


  //return response()->json($data);


	public function store(CreateServiciosRequest $request)
	{
		/***************************/

		$file = Input::file('foto');
		//Creamos una instancia de la libreria instalada

		$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

		//Ruta donde queremos guardar las imagenes
		$path = public_path().'/servicios-img/';

		// Guardar Original
		$image->save($path.$file->getClientOriginalName());
		// Cambiar de tamaño
		$image->resize(240,200);
		// Guardar
		$image->save($path.'thumb_'.$file->getClientOriginalName());


		/**************************/


	  $data = [
		'nombre' => $request->get('nombre'),
		'descripcion' => str_slug($request->get('descripcion')),
		'id_tipo_servicio' => $request->get('id_tipo_servicio'),
		'id_estatus' => $request->get('id_estatus'),
	  	'ponderacion' => $request->get('ponderacion'),
	  	'foto' => $file->getClientOriginalName()
	  ];



		$servicios = $this->serviciosRepository->create($data);

		Flash::success('Servicios Guardado Correctamente.');

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

		//$tiposervicios = Tiposervicio::where('id_categoria','6')->orderBy('id', 'asc')->lists('nombre', 'id');

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

		/***************************muy importante , 'files' => 'true' esto debe ir en la cabecera del form de lo contrario da error con la imagen por que no la consigue Image source not readable*/

		/*validar qie la imagen este llegando de lo contrario explota*/

		$file = Input::file('foto');
		//Creamos una instancia de la libreria instalada

		$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

		//Ruta donde queremos guardar las imagenes
		$path = public_path().'/servicios-img/';

		// Guardar Original
		$image->save($path.$file->getClientOriginalName());
		// Cambiar de tamaño
		$image->resize(240,200);
		// Guardar
		$image->save($path.'thumb_'.$file->getClientOriginalName());


		/**************************/


		$data = [
			'nombre' => $request->get('nombre'),
			'descripcion' => str_slug($request->get('descripcion')),
			'id_tipo_servicio' => $request->get('id_tipo_servicio'),
			'id_estatus' => $request->get('id_estatus'),
			'ponderacion' => $request->get('ponderacion'),
			'foto' => $file->getClientOriginalName()
		];


		if(empty($data))
		{
			Flash::error('No hay Servicios');

			return redirect(route('servicios.index'));
		}

		$servicios = $this->serviciosRepository->updateRich($data, $id);

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

		Flash::success('Servicio Borrado Correctamente.');

		return redirect(route('servicios.index'));
	}
}
