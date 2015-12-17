<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateInsumosFotoRequest;
use App\Http\Requests\UpdateInsumosFotoRequest;
use App\Libraries\Repositories\InsumosFotoRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumosFotoController extends AppBaseController
{

	/** @var  InsumosFotoRepository */
	private $insumosFotoRepository;

	function __construct(InsumosFotoRepository $insumosFotoRepo)
	{
		$this->insumosFotoRepository = $insumosFotoRepo;
	}

	/**
	 * Display a listing of the InsumosFoto.
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumosFotos = $this->insumosFotoRepository->paginate(10);

		return view('insumosFotos.index')
			->with('insumosFotos', $insumosFotos);
	}

	/**
	 * Show the form for creating a new InsumosFoto.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('insumosFotos.create');
	}

	/**
	 * Store a newly created InsumosFoto in storage.
	 *
	 * @param CreateInsumosFotoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInsumosFotoRequest $request)
	{
		$input = $request->all();

		$insumosFoto = $this->insumosFotoRepository->create($input);

		Flash::success('InsumosFoto saved successfully.');

		return redirect(route('insumosFotos.index'));
	}

	/**
	 * Display the specified InsumosFoto.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumosFoto = $this->insumosFotoRepository->find($id);

		if(empty($insumosFoto))
		{
			Flash::error('InsumosFoto not found');

			return redirect(route('insumosFotos.index'));
		}

		return view('insumosFotos.show')->with('insumosFoto', $insumosFoto);
	}

	/**
	 * Show the form for editing the specified InsumosFoto.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$insumosFoto = $this->insumosFotoRepository->find($id);

		if(empty($insumosFoto))
		{
			Flash::error('InsumosFoto not found');

			return redirect(route('insumosFotos.index'));
		}

		return view('insumosFotos.edit')->with('insumosFoto', $insumosFoto);
	}

	/**
	 * Update the specified InsumosFoto in storage.
	 *
	 * @param  int              $id
	 * @param UpdateInsumosFotoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInsumosFotoRequest $request)
	{
		$insumosFoto = $this->insumosFotoRepository->find($id);

		if(empty($insumosFoto))
		{
			Flash::error('InsumosFoto not found');

			return redirect(route('insumosFotos.index'));
		}

		$this->insumosFotoRepository->updateRich($request->all(), $id);

		Flash::success('InsumosFoto updated successfully.');

		return redirect(route('insumosFotos.index'));
	}

	/**
	 * Remove the specified InsumosFoto from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$insumosFoto = $this->insumosFotoRepository->find($id);

		if(empty($insumosFoto))
		{
			Flash::error('InsumosFoto not found');

			return redirect(route('insumosFotos.index'));
		}

		$this->insumosFotoRepository->delete($id);

		Flash::success('InsumosFoto deleted successfully.');

		return redirect(route('insumosFotos.index'));
	}
}
