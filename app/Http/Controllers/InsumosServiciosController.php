<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateInsumosServiciosRequest;
use App\Http\Requests\UpdateInsumosServiciosRequest;
use App\Libraries\Repositories\InsumosServiciosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumosServiciosController extends AppBaseController
{

	/** @var  InsumosServiciosRepository */
	private $insumosServiciosRepository;

	function __construct(InsumosServiciosRepository $insumosServiciosRepo)
	{
		$this->insumosServiciosRepository = $insumosServiciosRepo;
	}

	/**
	 * Display a listing of the InsumosServicios.
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumosServicios = $this->insumosServiciosRepository->paginate(10);

		return view('modulos.insumosServicios.index')
			->with('insumosServicios', $insumosServicios);
	}

	/**
	 * Show the form for creating a new InsumosServicios.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('modulos.insumosServicios.create');
	}

	/**
	 * Store a newly created InsumosServicios in storage.
	 *
	 * @param CreateInsumosServiciosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInsumosServiciosRequest $request)
	{
		$input = $request->all();

		$insumosServicios = $this->insumosServiciosRepository->create($input);

		Flash::success('InsumosServicios saved successfully.');

		return redirect(route('insumosServicios.index'));
	}

	/**
	 * Display the specified InsumosServicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumosServicios = $this->insumosServiciosRepository->find($id);

		if(empty($insumosServicios))
		{
			Flash::error('InsumosServicios not found');

			return redirect(route('insumosServicios.index'));
		}

		return view('modulos.insumosServicios.show')->with('insumosServicios', $insumosServicios);
	}

	/**
	 * Show the form for editing the specified InsumosServicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$insumosServicios = $this->insumosServiciosRepository->find($id);

		if(empty($insumosServicios))
		{
			Flash::error('InsumosServicios not found');

			return redirect(route('insumosServicios.index'));
		}

		return view('modulos.insumosServicios.edit')->with('insumosServicios', $insumosServicios);
	}

	/**
	 * Update the specified InsumosServicios in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInsumosServiciosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInsumosServiciosRequest $request)
	{
		$insumosServicios = $this->insumosServiciosRepository->find($id);

		if(empty($insumosServicios))
		{
			Flash::error('InsumosServicios not found');

			return redirect(route('insumosServicios.index'));
		}

		$this->insumosServiciosRepository->updateRich($request->all(), $id);

		Flash::success('InsumosServicios updated successfully.');

		return redirect(route('insumosServicios.index'));
	}

	/**
	 * Remove the specified InsumosServicios from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$insumosServicios = $this->insumosServiciosRepository->find($id);

		if(empty($insumosServicios))
		{
			Flash::error('InsumosServicios not found');

			return redirect(route('insumosServicios.index'));
		}

		$this->insumosServiciosRepository->delete($id);

		Flash::success('InsumosServicios deleted successfully.');

		return redirect(route('insumosServicios.index'));
	}
}
