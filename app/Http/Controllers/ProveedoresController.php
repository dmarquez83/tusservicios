<?php namespace App\Http\Controllers;


use App\Models\Proveedores;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateProveedoresRequest;
use App\Http\Requests\UpdateProveedoresRequest;
use App\Libraries\Repositories\ProveedoresRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\File;
use App\Models\Insumo;

class ProveedoresController extends AppBaseController
{

	/** @var  ProveedoresRepository */
	private $proveedoresRepository;

	function __construct(ProveedoresRepository $proveedoresRepo)
	{
		$this->proveedoresRepository = $proveedoresRepo;
	}

	/**
	 * Display a listing of the Proveedores.
	 *
	 * @return Response
	 */
	public function index()
	{
		$proveedores = $this->proveedoresRepository->paginate(10);

		return view('proveedores.index')
			->with('proveedores', $proveedores);
	}

	/**
	 * Show the form for creating a new Proveedores.
	 *
	 * @return Response
	 */
	public function create()
	{

		$insumos = Insumo::orderby('id','desc')->get();

		return view('proveedores.create', compact('insumos'));
	}

	/**
	 * Store a newly created Proveedores in storage.
	 *
	 * @param CreateProveedoresRequest $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if($request->get('descripcion')){

			$this->validate($request, [
				'nombre' => 'required|max:255',
				'descripcion' => 'required|max:500',
				'referencia' => 'required|max:100',
				'foto'  => 'required'
			]);


			$file = Input::file('foto');
			//Creamos una instancia de la libreria instalada

			$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

			//Ruta donde queremos guardar las imagenes
			$path = public_path().'/insumos-img/';

			// Guardar Original
			$image->save($path.$file->getClientOriginalName());

			$data = [
				'descripcion' => $request->get('descripcion'),
				'referencia' => $request->get('referencia'),
				'foto' => $file->getClientOriginalName(),
				'nombre' => $request->get('nombre')
			];


			Insumo::create($data);

			Flash::success('Insumos Guardada Correctamente.');

			return redirect(route('admin.proveedores.create'));

		}else{

			$input = $request->all();

			$proveedores = $this->proveedoresRepository->create($input);

			Flash::success('Proveedores guardado correctamente.');

			return redirect(route('admin.proveedores.index'));

		}


	}

	/**
	 * Display the specified Proveedores.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores  no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		return view('proveedores.show')->with('proveedores', $proveedores);
	}

	/**
	 * Show the form for editing the specified Proveedores.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores  no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		return view('proveedores.edit')->with('proveedores', $proveedores);
	}

	/**
	 * Update the specified Proveedores in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProveedoresRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProveedoresRequest $request)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores  no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		$this->proveedoresRepository->updateRich($request->all(), $id);

		Flash::success('Proveedores actualizados correctamente.');

		return redirect(route('admin.proveedores.index'));
	}

	/**
	 * Remove the specified Proveedores from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		$this->proveedoresRepository->delete($id);

		Flash::success('Proveedores borrados correctamente.');

		return redirect(route('admin.proveedores.index'));
	}

	public function storeInsumos($data)
	{


	}
}
