<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuariosServiciosRequest;
use App\Http\Requests\UpdateUsuariosServiciosRequest;
use App\Libraries\Repositories\UsuariosServiciosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\Horas;
use App\Models\Dias;

class UsuariosServiciosController extends AppBaseController
{

	/** @var  UsuariosServiciosRepository */
	private $usuariosServiciosRepository;

	function __construct(UsuariosServiciosRepository $usuariosServiciosRepo)
	{
		$this->usuariosServiciosRepository = $usuariosServiciosRepo;
	}

	/**
	 * Display a listing of the UsuariosServicios.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuariosServicios = $this->usuariosServiciosRepository->paginate(10);

		return view('usuariosServicios.index')
			->with('usuariosServicios', $usuariosServicios);
	}

	/**
	 * Show the form for creating a new UsuariosServicios.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = Categoria::orderBy('id', 'asc')->lists('nombre', 'id');

		$ciudades = Ciudad::get();

		$horas = Horas::get();

		$dias = Dias::get();

		//dd($ciudades);

		return view('usuariosServicios.create', compact('ciudades','categorias','horas','dias'));


	}

	/**
	 * Store a newly created UsuariosServicios in storage.
	 *
	 * @param CreateUsuariosServiciosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsuariosServiciosRequest $request)
	{
		$input = $request->all();

		$usuariosServicios = $this->usuariosServiciosRepository->create($input);

		Flash::success('UsuariosServicios saved successfully.');

		return redirect(route('usuario.servicios.index'));
	}

	/**
	 * Display the specified UsuariosServicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('UsuariosServicios not found');

			return redirect(route('usuario.servicios.index'));
		}

		return view('usuariosServicios.show')->with('usuariosServicios', $usuariosServicios);
	}

	/**
	 * Show the form for editing the specified UsuariosServicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('UsuariosServicios not found');

			return redirect(route('usuario.servicios.index'));
		}

		return view('usuariosServicios.edit')->with('usuariosServicios', $usuariosServicios);
	}

	/**
	 * Update the specified UsuariosServicios in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUsuariosServiciosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUsuariosServiciosRequest $request)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('UsuariosServicios not found');

			return redirect(route('usuario.servicios.index'));
		}

		$this->usuariosServiciosRepository->updateRich($request->all(), $id);

		Flash::success('UsuariosServicios updated successfully.');

		return redirect(route('usuario.servicios.index'));
	}

	/**
	 * Remove the specified UsuariosServicios from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('UsuariosServicios not found');

			return redirect(route('usuario.servicios.index'));
		}

		$this->usuariosServiciosRepository->delete($id);

		Flash::success('UsuariosServicios deleted successfully.');

		return redirect(route('usuario.servicios.index'));
	}
}
