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
use Illuminate\Support\Facades\File;

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
	$categorias = $this->categoriaRepository->all();

	return view('modulos.categorias.index')
	  ->with('categorias', $categorias);
  }

  /**
   * Show the form for creating a new Categoria.
   *
   * @return Response
   */
  public function create()
  {
	return view('modulos.categorias.create');
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


	$this->validate($request, [
	  'nombre' => 'required|unique:categorias|max:255',
	  'descripcion' => 'required|max:500',
	  'foto'  => 'required'
	]);

	/***************************/

	$file = Input::file('foto');
	//Creamos una instancia de la libreria instalada

	$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

	//Ruta donde queremos guardar las imagenes
	$path = public_path().'/assets/img/categorias-img/';

	// Guardar Original
	$image->save($path.$file->getClientOriginalName());
	// Cambiar de tamaño
	$image->resize(240,200);
	// Guardar
	$image->save($path.'thumb_'.$file->getClientOriginalName());

	/**************************/



	$data = [
	  'nombre' => $request->get('nombre'),
	  'descripcion' => ($request->get('descripcion')),
	  'foto' => $file->getClientOriginalName()
	];


	$this->categoriaRepository->create($data);

	Flash::success('Categoria Guardada Correctamente.');

	return redirect(route('admin.categorias.index'));

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

	return view('modulos.categorias.show')->with('categoria', $categoria);
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
	//dd($categoria);

	if(empty($categoria))
	{
	  Flash::error('Categoria no encontrada');

	  return redirect(route('categorias.index'));
	}

	return view('modulos.categorias.edit')->with('categoria', $categoria);
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
	//dd($request);
	$this->validate($request, [
	  'nombre' => 'max:255',
	  'descripcion' => 'max:500'
	]);


	$categoria = $this->categoriaRepository->find($id);

	if(empty($categoria))
	{
	  Flash::error('Categoria no encontrada');

	  return redirect(route('admin.categorias.index'));
	}

	/***************************/
	if(Input::file('foto')==null){
		$file = Input::file('foto_name');
		$data = [
			'nombre' => $request->get('nombre'),
			'descripcion' => str_slug($request->get('descripcion'))
		];
	}

	else{
	  $file = Input::file('foto');
	  //Creamos una instancia de la libreria instalada

	  $image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

	  //Ruta donde queremos guardar las imagenes
	  $path = public_path().'/assets/img/categorias-img/';

	  // Guardar Original
	  $image->save($path.$file->getClientOriginalName());
	  // Cambiar de tamaño
	  $image->resize(240,200);
	  // Guardar
	  $image->save($path.'thumb_'.$file->getClientOriginalName());

		$data = [
			'nombre' => $request->get('nombre'),
			'descripcion' => str_slug($request->get('descripcion')),
			'foto' => $file->getClientOriginalName()
		];
	}
	  /**************************/

	$categoria = $this->categoriaRepository->updateRich($data, $id);

	Flash::success('Categoria Actualizada Correctamente.');

	return redirect(route('admin.categorias.index'));
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

	return redirect(route('admin.categorias.index'));
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