<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTiposervicioRequest;
use App\Http\Requests\UpdateTiposervicioRequest;

use App\Libraries\Repositories\TiposervicioRepository;
use App\Libraries\Repositories\CategoriaRepository;


use App\Models\Tiposervicio;
use Flash;
use Illuminate\Support\Facades\DB;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Categoria;

class TiposervicioController extends AppBaseController
{

	/** @var  TiposervicioRepository */
	private $tiposervicioRepository;



	function __construct(TiposervicioRepository $tiposervicioRepo, CategoriaRepository $categoriaRepo)
	{
		$this->tiposervicioRepository = $tiposervicioRepo;

		$this->categoriaRepository = $categoriaRepo;

	}


	/**
	 * Display a listing of the Tiposervicio.
	 *
	 * @return Response
	 */
	public function index()
	{


	  $tiposervicios = DB::table('tiposervicios')
		->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
		->orderBy('id', 'desc')
		->select('tiposervicios.id','tiposervicios.nombre','tiposervicios.descripcion','tiposervicios.id_categoria','categorias.nombre as categoria')
		->get();

	  //$tiposervicios = $this->tiposervicioRepository->all();

	  //return response()->json($tiposervicios);


	  return view('tiposervicios.indextiposervicios')->with('tiposervicios', $tiposervicios);

	}

  /**
   * Display a listing of the Tiposervicio.
   *
   * @return Response
   */
  public function indextiposervicio()
  {
	$categorias = $this->categoriaRepository->paginate(10);
	//dd($categorias);

	return view('tiposervicios.index')->with('categorias', $categorias);


  }

	/**
	 * Show the form for creating a new Tiposervicio.
	 *
	 * @return Response
	 */
	public function create()
	{

		$categorias = Categoria::orderBy('id', 'asc')->lists('nombre', 'id');
		return view('tiposervicios.create', compact('categorias'));
	}


	/**
	 * Display the specified Tiposervicio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tiposervicio = $this->tiposervicioRepository->find($id);

		if(empty($tiposervicio))
		{
			Flash::error('Tiposervicio not found');

			return redirect(route('admin.tiposervicios.index'));
		}

		return view('tiposervicios.show')->with('tiposervicio', $tiposervicio);
	}
  /**
   * Store a newly created Tiposervicio in storage.
   *
   * @param CreateTiposervicioRequest $request
   *
   * @return Response
   */
  public function store(CreateTiposervicioRequest $request)
  {
	$input = $request->all();

	$tiposervicio = $this->tiposervicioRepository->create($input);

	Flash::success('Tiposervicio saved successfully.');

	return redirect(route('admin.tiposervicios.index'));
  }

	/**
	 * Show the form for editing the specified Tiposervicio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function createnew($id)
	{
	    $categoria = $this->categoriaRepository->find($id);
		//$categoria = Categoria::where('id', $id)->lists('nombre', 'id');
		//return response()->json($categorias);
		return view('tiposervicios.create')->with('categoria', $categoria);
	}


	public function storenew($id, CreateTiposervicioRequest $request)
	{
         //  return response($id);

	  $data = [
          'nombre' => $request->get('nombre'),
          'descripcion' => str_slug($request->get('descripcion')),
          'id_categoria' => $id
      ];
	  //return response()->json($data);

              $tiposervicio = $this->tiposervicioRepository->create($data);

              $message = $tiposervicio ? 'Tipo de Servicio agregado correctamente!' : 'Tipo de Servicio NO pudo agregarse!';

              Flash::success($message);

              return redirect()->route('tiposerviciost.indextiposervicio')->with('message', $message);
	}

	/**
	 * Show the form for editing the specified Tiposervicio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$tiposervicio = $this->tiposervicioRepository->find($id);

		if(empty($tiposervicio))
		{
			Flash::error('Tiposervicio not found');

			return redirect(route('admin.tiposervicios.index'));
		}

		$categorias = Categoria::find($tiposervicio->id_categoria)->lists('nombre', 'id');

		return view('tiposervicios.edit', compact('categorias'))->with('tiposervicio', $tiposervicio);
	}

	/**
	 * Update the specified Tiposervicio in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTiposervicioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTiposervicioRequest $request)
	{
		$tiposervicio = $this->tiposervicioRepository->find($id);

		if(empty($tiposervicio))
		{
			Flash::error('Tiposervicio not found');

			return redirect(route('admin.tiposervicios.index'));
		}

		$tiposervicio = $this->tiposervicioRepository->updateRich($request->all(), $id);

		Flash::success('Tipo de Servicio Actulizado correctamente.');

		return redirect(route('admin.tiposervicios.index'));
	}

	/**
	 * Remove the specified Tiposervicio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tiposervicio = $this->tiposervicioRepository->find($id);

		if(empty($tiposervicio))
		{
			Flash::error('Tiposervicio not found');

			return redirect(route('admin.tiposervicios.index'));
		}

		$this->tiposervicioRepository->delete($id);

		Flash::success('Tipo de servicio Borrado Correctamente.');

	  return redirect(route('admin.tiposervicios.index'));
	}
}
