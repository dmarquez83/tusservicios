<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProveedoresInsumosRequest;
use App\Http\Requests\UpdateProveedoresInsumosRequest;
use App\Libraries\Repositories\ProveedoresInsumosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProveedoresInsumosController extends AppBaseController
{

	/** @var  ProveedoresInsumosRepository */
	private $proveedoresInsumosRepository;

	function __construct(ProveedoresInsumosRepository $proveedoresInsumosRepo)
	{
		$this->proveedoresInsumosRepository = $proveedoresInsumosRepo;
	}

	/**
	 * Display a listing of the ProveedoresInsumos.
	 *
	 * @return Response
	 */
	public function index()
	{
		$proveedoresInsumos = $this->proveedoresInsumosRepository->paginate(10);

		return view('proveedoresInsumos.index')
			->with('proveedoresInsumos', $proveedoresInsumos);
	}

	/**
	 * Show the form for creating a new ProveedoresInsumos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('proveedoresInsumos.create');
	}

	/**
	 * Store a newly created ProveedoresInsumos in storage.
	 *
	 * @param CreateProveedoresInsumosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProveedoresInsumosRequest $request)
	{
		$input = $request->all();

		$proveedoresInsumos = $this->proveedoresInsumosRepository->create($input);

		Flash::success('ProveedoresInsumos saved successfully.');

		return redirect(route('proveedoresInsumos.index'));
	}

	/**
	 * Display the specified ProveedoresInsumos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$proveedoresInsumos = $this->proveedoresInsumosRepository->find($id);

		if(empty($proveedoresInsumos))
		{
			Flash::error('ProveedoresInsumos not found');

			return redirect(route('proveedoresInsumos.index'));
		}

		return view('proveedoresInsumos.show')->with('proveedoresInsumos', $proveedoresInsumos);
	}

	/**
	 * Show the form for editing the specified ProveedoresInsumos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$proveedoresInsumos = $this->proveedoresInsumosRepository->find($id);

		if(empty($proveedoresInsumos))
		{
			Flash::error('ProveedoresInsumos not found');

			return redirect(route('proveedoresInsumos.index'));
		}

		return view('proveedoresInsumos.edit')->with('proveedoresInsumos', $proveedoresInsumos);
	}

	/**
	 * Update the specified ProveedoresInsumos in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProveedoresInsumosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProveedoresInsumosRequest $request)
	{
		$proveedoresInsumos = $this->proveedoresInsumosRepository->find($id);

		if(empty($proveedoresInsumos))
		{
			Flash::error('ProveedoresInsumos not found');

			return redirect(route('proveedoresInsumos.index'));
		}

		$this->proveedoresInsumosRepository->updateRich($request->all(), $id);

		Flash::success('ProveedoresInsumos updated successfully.');

		return redirect(route('proveedoresInsumos.index'));
	}

	/**
	 * Remove the specified ProveedoresInsumos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$proveedoresInsumos = $this->proveedoresInsumosRepository->find($id);

		if(empty($proveedoresInsumos))
		{
			Flash::error('ProveedoresInsumos not found');

			return redirect(route('proveedoresInsumos.index'));
		}

		$this->proveedoresInsumosRepository->delete($id);

		Flash::success('ProveedoresInsumos deleted successfully.');

		return redirect(route('proveedoresInsumos.index'));
	}
}
