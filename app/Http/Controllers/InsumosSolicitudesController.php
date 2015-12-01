<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateInsumosSolicitudesRequest;
use App\Http\Requests\UpdateInsumosSolicitudesRequest;
use App\Libraries\Repositories\InsumosSolicitudesRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumosSolicitudesController extends AppBaseController
{

	/** @var  InsumosSolicitudesRepository */
	private $insumosSolicitudesRepository;

	function __construct(InsumosSolicitudesRepository $insumosSolicitudesRepo)
	{
		$this->insumosSolicitudesRepository = $insumosSolicitudesRepo;
	}

	/**
	 * Display a listing of the InsumosSolicitudes.
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumosSolicitudes = $this->insumosSolicitudesRepository->paginate(10);

		return view('insumosSolicitudes.index')
			->with('insumosSolicitudes', $insumosSolicitudes);
	}

	/**
	 * Show the form for creating a new InsumosSolicitudes.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('insumosSolicitudes.create');
	}

	/**
	 * Store a newly created InsumosSolicitudes in storage.
	 *
	 * @param CreateInsumosSolicitudesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInsumosSolicitudesRequest $request)
	{
		$input = $request->all();

		$insumosSolicitudes = $this->insumosSolicitudesRepository->create($input);

		Flash::success('InsumosSolicitudes saved successfully.');

		return redirect(route('insumosSolicitudes.index'));
	}

	/**
	 * Display the specified InsumosSolicitudes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumosSolicitudes = $this->insumosSolicitudesRepository->find($id);

		if(empty($insumosSolicitudes))
		{
			Flash::error('InsumosSolicitudes not found');

			return redirect(route('insumosSolicitudes.index'));
		}

		return view('insumosSolicitudes.show')->with('insumosSolicitudes', $insumosSolicitudes);
	}

	/**
	 * Show the form for editing the specified InsumosSolicitudes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$insumosSolicitudes = $this->insumosSolicitudesRepository->find($id);

		if(empty($insumosSolicitudes))
		{
			Flash::error('InsumosSolicitudes not found');

			return redirect(route('insumosSolicitudes.index'));
		}

		return view('insumosSolicitudes.edit')->with('insumosSolicitudes', $insumosSolicitudes);
	}

	/**
	 * Update the specified InsumosSolicitudes in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInsumosSolicitudesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInsumosSolicitudesRequest $request)
	{
		$insumosSolicitudes = $this->insumosSolicitudesRepository->find($id);

		if(empty($insumosSolicitudes))
		{
			Flash::error('InsumosSolicitudes not found');

			return redirect(route('insumosSolicitudes.index'));
		}

		$this->insumosSolicitudesRepository->updateRich($request->all(), $id);

		Flash::success('InsumosSolicitudes updated successfully.');

		return redirect(route('insumosSolicitudes.index'));
	}

	/**
	 * Remove the specified InsumosSolicitudes from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$insumosSolicitudes = $this->insumosSolicitudesRepository->find($id);

		if(empty($insumosSolicitudes))
		{
			Flash::error('InsumosSolicitudes not found');

			return redirect(route('insumosSolicitudes.index'));
		}

		$this->insumosSolicitudesRepository->delete($id);

		Flash::success('InsumosSolicitudes deleted successfully.');

		return redirect(route('insumosSolicitudes.index'));
	}
}
