<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateInsumoRequest;
use App\Http\Requests\UpdateInsumoRequest;
use App\Libraries\Repositories\InsumoRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumoController extends AppBaseController
{

	/** @var  InsumoRepository */
	private $insumoRepository;

	function __construct(InsumoRepository $insumoRepo)
	{
		$this->insumoRepository = $insumoRepo;
	}

	/**
	 * Display a listing of the Insumo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumos = $this->insumoRepository->paginate(10);

		return view('insumos.index')
			->with('insumos', $insumos);
	}

	/**
	 * Show the form for creating a new Insumo.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('insumos.create');
	}

	/**
	 * Store a newly created Insumo in storage.
	 *
	 * @param CreateInsumoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInsumoRequest $request)
	{
		$input = $request->all();

		$insumo = $this->insumoRepository->create($input);

		Flash::success('Insumo saved successfully.');

		return redirect(route('insumos.index'));
	}

	/**
	 * Display the specified Insumo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumo = $this->insumoRepository->find($id);

		if(empty($insumo))
		{
			Flash::error('Insumo not found');

			return redirect(route('insumos.index'));
		}

		return view('insumos.show')->with('insumo', $insumo);
	}

	/**
	 * Show the form for editing the specified Insumo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$insumo = $this->insumoRepository->find($id);

		if(empty($insumo))
		{
			Flash::error('Insumo not found');

			return redirect(route('insumos.index'));
		}

		return view('insumos.edit')->with('insumo', $insumo);
	}

	/**
	 * Update the specified Insumo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInsumoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInsumoRequest $request)
	{
		$insumo = $this->insumoRepository->find($id);

		if(empty($insumo))
		{
			Flash::error('Insumo not found');

			return redirect(route('insumos.index'));
		}

		$insumo = $this->insumoRepository->updateRich($request->all(), $id);

		Flash::success('Insumo updated successfully.');

		return redirect(route('insumos.index'));
	}

	/**
	 * Remove the specified Insumo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$insumo = $this->insumoRepository->find($id);

		if(empty($insumo))
		{
			Flash::error('Insumo not found');

			return redirect(route('insumos.index'));
		}

		$this->insumoRepository->delete($id);

		Flash::success('Insumo deleted successfully.');

		return redirect(route('insumos.index'));
	}
}
