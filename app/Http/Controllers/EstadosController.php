<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEstadosRequest;
use App\Http\Requests\UpdateEstadosRequest;
use App\Libraries\Repositories\EstadosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class EstadosController extends AppBaseController
{

	/** @var  EstadosRepository */
	private $estadosRepository;

	function __construct(EstadosRepository $estadosRepo)
	{
		$this->estadosRepository = $estadosRepo;
	}

	/**
	 * Display a listing of the Estados.
	 *
	 * @return Response
	 */
	public function index()
	{
		$estados = $this->estadosRepository->paginate(10);

		return view('estados.index')
			->with('estados', $estados);
	}

	/**
	 * Show the form for creating a new Estados.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('modulos.estados.create');
	}

	/**
	 * Store a newly created Estados in storage.
	 *
	 * @param CreateEstadosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEstadosRequest $request)
	{
		$input = $request->all();

		$estados = $this->estadosRepository->create($input);

		Flash::success('Estados saved successfully.');

		return redirect(route('estados.index'));
	}

	/**
	 * Display the specified Estados.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$estados = $this->estadosRepository->find($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');

			return redirect(route('estados.index'));
		}

		return view('modulos.estados.show')->with('estados', $estados);
	}

	/**
	 * Show the form for editing the specified Estados.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$estados = $this->estadosRepository->find($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');

			return redirect(route('estados.index'));
		}

		return view('modulos.estados.edit')->with('estados', $estados);
	}

	/**
	 * Update the specified Estados in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEstadosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateEstadosRequest $request)
	{
		$estados = $this->estadosRepository->find($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');

			return redirect(route('estados.index'));
		}

		$this->estadosRepository->updateRich($request->all(), $id);

		Flash::success('Estados updated successfully.');

		return redirect(route('estados.index'));
	}

	/**
	 * Remove the specified Estados from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$estados = $this->estadosRepository->find($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');

			return redirect(route('estados.index'));
		}

		$this->estadosRepository->delete($id);

		Flash::success('Estados deleted successfully.');

		return redirect(route('estados.index'));
	}
}
