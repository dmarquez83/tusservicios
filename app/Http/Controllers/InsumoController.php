<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateInsumoRequest;
use App\Http\Requests\UpdateInsumoRequest;
use App\Libraries\Repositories\InsumoRepository;
use App\Models\Insumo;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\File;
use App\Models\Insumos;

class InsumoController extends AppBaseController
{

	/** @var  InsumoRepository */
	private $insumoRepository;

	function __construct(InsumoRepository $insumoRepo)
	{
		$this->insumoRepository = $insumoRepo;
	}

	/**
	 * Display a listing of the Insumo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumos = $this->insumoRepository->all();

	  //$insumos = Insumo::orderby('id','desc')->all();

		return view('insumos.index')
			->with('insumos', $insumos);
	}

	/**
	 * Show the form for creating a new Insumo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('insumos.create');
	}

	/**
	 * Store a newly created Insumo in storage.
	 *
	 * @param CreateInsumoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInsumoRequest $request)
	{

		$this->validate($request, [
		  'descripcion' => 'required|max:500',
		  'referencia' => 'required|max:100',
		  'foto'  => 'required'
		]);

	  /***************************/

	  $file = Input::file('foto');
	  //Creamos una instancia de la libreria instalada

	  $image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

	  //Ruta donde queremos guardar las imagenes
	  $path = public_path().'/insumos-img/';

	  // Guardar Original
	  $image->save($path.$file->getClientOriginalName());
	  // Cambiar de tamaño
	  //$image->resize(240,200);
	  // Guardar
	  //$image->save($path.'thumb_'.$file->getClientOriginalName());

	  /**************************/



	  $data = [
		'descripcion' => $request->get('descripcion'),
		'referencia' => $request->get('referencia'),
		'foto' => $file->getClientOriginalName(),
		'nombre' => $request->get('nombre')
	  ];


	  $this->insumoRepository->create($data);

	  Flash::success('Insumos Guardada Correctamente.');

	  return redirect(route('insumos.index'));
	}

	/**
	 * Display the specified Insumo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumo = $this->insumoRepository->find($id);

		if(empty($insumo))
		{
			Flash::error('No hay Insumos');

			return redirect(route('insumos.index'));
		}

		return view('insumos.show')->with('insumo', $insumo);
	}

	/**
	 * Show the form for editing the specified Insumo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
	  $insumos = $this->insumoRepository->find($id);
	  //dd($insumos);

		if(empty($insumos))
		{
			Flash::error('Insumo not found');

			return redirect(route('insumos.index'));
		}

		return view('insumos.edit')->with('insumos', $insumos);
	}

	/**
	 * Update the specified Insumo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInsumoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInsumoRequest $request)
	{
	  $this->validate($request, [
		'descripcion' => 'required|max:500',
		'referencia' => 'required|max:100',
		'foto'  => 'required'
	  ]);

	  /***************************/

	  $file = Input::file('foto');
	  //Creamos una instancia de la libreria instalada

	  $image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

	  //Ruta donde queremos guardar las imagenes
	  $path = public_path().'/insumos-img/';

	  // Guardar Original
	  $image->save($path.$file->getClientOriginalName());
	  // Cambiar de tamaño
	  //$image->resize(240,200);
	  // Guardar
	  //$image->save($path.'thumb_'.$file->getClientOriginalName());

	  /**************************/



	  $data = [
		'descripcion' => $request->get('descripcion'),
		'referencia' => $request->get('referencia'),
		'foto' => $file->getClientOriginalName()
	  ];


	  $insumo = $this->insumoRepository->updateRich($data, $id);

		Flash::success('Insumo Guardado Correctamente.');

		return redirect(route('insumos.index'));
	}

	/**
	 * Remove the specified Insumo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$insumo = $this->insumoRepository->find($id);

		if(empty($insumo))
		{
			Flash::error('Insumo no funciona');

			return redirect(route('insumos.index'));
		}

		$this->insumoRepository->delete($id);

		Flash::success('Insumo borrado correctamente.');

		return redirect(route('insumos.index'));
	}
}
