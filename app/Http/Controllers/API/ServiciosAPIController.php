<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ServiciosRepository;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
//use Intervention\Image\Facades\Image;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

use App\Models\Ponderacion;
use App\Models\Servicios;
use App\Models\Tiposervicio;
use App\Models\Estatu;

use Image;

class ServiciosAPIController extends AppBaseController
{
	/** @var  ServiciosRepository */
	private $serviciosRepository;

	function __construct(ServiciosRepository $serviciosRepo)
	{
		$this->serviciosRepository = $serviciosRepo;
	}

	/**
	 * Display a listing of the Servicios.
	 * GET|HEAD /servicios
	 *
	 * @return Response
	 */
	public function index()
	{
		$servicios = $this->serviciosRepository->all();

		return response()->json($servicios);
	}

	/**
	 * Show the form for creating a new Servicios.
	 * GET|HEAD /servicios/create
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
	 * POST /servicios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		/***************************/

		//$file = Input::file('image');
		//Creamos una instancia de la libreria instalada

		//$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

		//$image = Image::make(Input::file('image'));

		$img = Image::make('public/foo.jpg');

		//   $image = Image::make(Input::file('image'));
/*
		//Ruta donde queremos guardar las imagenes
		$path = public_path().'/thumbnails/';

		// Guardar Original
		$image->save($path.$file->getClientOriginalName());
		// Cambiar de tamaño
		$image->resize(240,200);
		// Guardar
		$image->save($path.'thumb_'.$file->getClientOriginalName());*/

		/**************************/


		if(sizeof(Servicios::$rules) > 0)
			$this->validateRequestOrFail($request, Servicios::$rules);

		$input = $request->all();

		$servicios = $this->serviciosRepository->create($input);

		//return $this->sendResponse($servicios->toArray(), "Servicios saved successfully");

		return response()->json($servicios);
	}

	/**
	 * Display the specified Servicios.
	 * GET|HEAD /servicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$servicios = $this->serviciosRepository->apiFindOrFail($id);

		return $this->sendResponse($servicios->toArray(), "Servicios retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Servicios.
	 * GET|HEAD /servicios/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));

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
	 * PUT/PATCH /servicios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Servicios $servicios */
		$servicios = $this->serviciosRepository->apiFindOrFail($id);

		$result = $this->serviciosRepository->updateRich($input, $id);

		$servicios = $servicios->fresh();

		return $this->sendResponse($servicios->toArray(), "Servicios updated successfully");
	}

	/**
	 * Remove the specified Servicios from storage.
	 * DELETE /servicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->serviciosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Servicios deleted successfully");
	}
}
