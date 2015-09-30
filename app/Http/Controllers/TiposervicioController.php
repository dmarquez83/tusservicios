<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTiposervicioRequest;
use App\Http\Requests\UpdateTiposervicioRequest;
use App\Libraries\Repositories\TiposervicioRepository;
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

	function __construct(TiposervicioRepository $tiposervicioRepo)
	{
		$this->tiposervicioRepository = $tiposervicioRepo;
	}

	/**
	 * Display a listing of the Tiposervicio.
	 *
	 * @return Response
	 */
	public function index()
	{
	//	$tiposervicios = $this->tiposervicioRepository->paginate(10);

		//$sele = marca::distinct()->select('marca.COD_MARCA','marca.NOMBRE_MARCA')->join('modelo','modelo.COD_MARCA' ,'=','marca.COD_MARCA')->where('modelo.COD_CATEGORIA','=',$id)->where('marca.ACTIVO','=',1)->get();

       //$users = DB::table('users')
		//->join('contacts', 'users.id', '=', 'contacts.user_id')
		//->join('orders', 'users.id', '=', 'orders.user_id')
		//->select('users.*', 'contacts.phone', 'orders.price')
		//->get();

		//$tiposervicios = Tiposervicio::distinct()->select('tiposervicios.NOMBRE','tiposervicios.DESCRIPCION','categorias.NOMBRE')->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')->get();

		$tiposervicios = DB::table('tiposervicios')
			->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
			->select('tiposervicios.id','tiposervicios.nombre','tiposervicios.descripcion','tiposervicios.id_categoria','categorias.nombre as categoria'  )
			->get();

		//return view('tiposervicios.index', ['tiposervicios' => $tiposervicios]);

		//return view('tiposervicios.index')
		//	->with('tiposervicios', $tiposervicios);

		return response()->json($tiposervicios);



	}

	/**
	 * Show the form for creating a new Tiposervicio.
	 *
	 * @return Response
	 */
	public function create()
	{

		/*	$categorias_todo = Categoria::all();

		foreach ($categorias_todo as $ct){
		//$categorias[0]=$ct->id;
		$categorias[0]=$ct->nombre;

		}*/

		/*    $categories = Category::orderBy('id', 'asc')->lists('name', 'id');

		return view('admin.product.create', compact('categories'));*/

		/*	$categorias = Categoria::all();
		return view('tiposervicios.create')
		->with('categorias', $categorias);*/

		$categorias = Categoria::orderBy('id', 'asc')->lists('nombre', 'id');
		return view('tiposervicios.create', compact('categorias'));
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

		$data = [
			'nombre' => $request->get('nombre'),
			'descripcion' => str_slug($request->get('descripcion')),
			'id_categoria' => $request->get('id_categoria')
		];
		//return response()->json($data);

		$tiposervicio = $this->tiposervicioRepository->create($data);



		$message = $tiposervicio ? 'Tipo de Servicio agregado correctamente!' : 'Tipo de Servicio NO pudo agregarse!';

		Flash::success($message);

		return redirect()->route('tiposervicios.index')->with('message', $message);

		//Flash::success('Tipo de Servicio agregado correctamente');

	//	return view('tiposervicios.index')
		//	->with('message', $message);

		/*Flash::success('Tiposervicio saved successfully.');

		return redirect(route('tiposervicios.index'));*/
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

			return redirect(route('tiposervicios.index'));
		}

		return view('tiposervicios.show')->with('tiposervicio', $tiposervicio);
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

			return redirect(route('tiposervicios.index'));
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

			return redirect(route('tiposervicios.index'));
		}

		$tiposervicio = $this->tiposervicioRepository->updateRich($request->all(), $id);

		Flash::success('Tiposervicio updated successfully.');

		return redirect(route('tiposervicios.index'));
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

			return redirect(route('tiposervicios.index'));
		}

		$this->tiposervicioRepository->delete($id);

		Flash::success('Tiposervicio deleted successfully.');

		return redirect(route('tiposervicios.index'));
	}
}
