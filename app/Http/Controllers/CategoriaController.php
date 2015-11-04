<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Libraries\Repositories\CategoriaRepository;
use App\Models\Categoria;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;

class CategoriaController extends AppBaseController
{

	/** @var  CategoriaRepository */
	private $categoriaRepository;

	function __construct(CategoriaRepository $categoriaRepo)
	{
		$this->categoriaRepository = $categoriaRepo;
	}

	/**
	 * Display a listing of the Categoria.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = $this->categoriaRepository->paginate(10);

		return view('categorias.index')
			->with('categorias', $categorias);
	}

	/**
	 * Show the form for creating a new Categoria.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias.create');
	}

	/**
	 * Store a newly created Categoria in storage.
	 *
	 * @param CreateCategoriaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCategoriaRequest $request)
	{

		/***************************/

		$file = Input::file('foto');
		//Creamos una instancia de la libreria instalada

		$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

		//Ruta donde queremos guardar las imagenes
		$path = public_path().'/categorias-img/';

		// Guardar Original
		$image->save($path.$file->getClientOriginalName());
		// Cambiar de tamaño
		$image->resize(240,200);
		// Guardar
		$image->save($path.'thumb_'.$file->getClientOriginalName());


		/**************************/

		$this->validate($request, [
			'nombre' => 'required|unique:categorias|max:255',
			'decripcion' => 'max:500'
		]);

		//$input = $request->all();

		//return response($input); //asi veo lo que viene del formulario incluyendo el token {"_token":"fYOAOVc7JawpdobkgdcpsNoDcXKW6xkzEdbq9SWb","nombre":"tget","descripcion":"ergf","foto":{}}

		//$categoria = $this->categoriaRepository->create($input);
		//$categoria = Categoria::create($input);

		$data = [
			'nombre' => $request->get('nombre'),
			'decripcion' => str_slug($request->get('decripcion')),
			'foto' => $file->getClientOriginalName()
		];


		$this->categoriaRepository->create($data);

		Flash::success('Categoria Guardada Correctamente.');

		return redirect(route('categorias.index'));

		/*
		return Categoria::create([
			'nombre' =>$nombre,
			'decripcion' =>$descripcion,
		]);*/


	}

	/**
	 * Display the specified Categoria.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		return view('categorias.show')->with('categoria', $categoria);
	}

	/**
	 * Show the form for editing the specified Categoria.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		return view('categorias.edit')->with('categoria', $categoria);
	}

	/**
	 * Update the specified Categoria in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCategoriaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCategoriaRequest $request)
	{

		$this->validate($request, [
			'nombre' => 'max:255',
			'decripcion' => 'max:500'
		]);


		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		/***************************/

		$file = Input::file('foto');
		//Creamos una instancia de la libreria instalada

		$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

		//Ruta donde queremos guardar las imagenes
		$path = public_path().'/categorias-img/';

		// Guardar Original
		$image->save($path.$file->getClientOriginalName());
		// Cambiar de tamaño
		$image->resize(240,200);
		// Guardar
		$image->save($path.'thumb_'.$file->getClientOriginalName());


		/**************************/

		$data = [
			'nombre' => $request->get('nombre'),
			'decripcion' => str_slug($request->get('decripcion')),
			'foto' => $file->getClientOriginalName()
		];


		$categoria = $this->categoriaRepository->updateRich($data, $id);

		Flash::success('Categoria Actualizada Correctamente.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Remove the specified Categoria from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = $this->categoriaRepository->find($id);

		if(empty($categoria))
		{
			Flash::error('Categoria no encontrada');

			return redirect(route('categorias.index'));
		}

		$this->categoriaRepository->delete($id);

		Flash::success('Categoria Borrada Correctamente.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'nombre' => 'required|max:255',
			'descripcion' => 'required|max:255',
		]);
	}
}