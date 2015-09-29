<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTiposervicioRequest;
use App\Http\Requests\UpdateTiposervicioRequest;
use App\Libraries\Repositories\TiposervicioRepository;
use Flash;
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
		$tiposervicios = $this->tiposervicioRepository->paginate(10);

		return view('tiposervicios.index')
			->with('tiposervicios', $tiposervicios);
	}

	/**
	 * Show the form for creating a new Tiposervicio.
	 *
	 * @return Response
	 */
	public function create()
	{

		$categorias = Categoria::all();

		return view('tiposervicios.create')
			->with('categorias', $categorias);
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

		return redirect(route('tiposervicios.index'));
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

		return view('tiposervicios.edit')->with('tiposervicio', $tiposervicio);
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
