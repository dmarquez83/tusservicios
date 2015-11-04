<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEstatuRequest;
use App\Http\Requests\UpdateEstatuRequest;
use App\Libraries\Repositories\EstatuRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class EstatuController extends AppBaseController
{

	/** @var  EstatuRepository */
	private $estatuRepository;

	function __construct(EstatuRepository $estatuRepo)
	{
		$this->estatuRepository = $estatuRepo;
	}

	/**
	 * Display a listing of the Estatu.
	 *
	 * @return Response
	 */
	public function index()
	{
		$estatus = $this->estatuRepository->paginate(10);

	  return view('estatus.index')
			->with('estatus', $estatus);

	  // return response()->json($estatus);

	}

	/**
	 * Show the form for creating a new Estatu.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('estatus.create');
	}

	/**
	 * Store a newly created Estatu in storage.
	 *
	 * @param CreateEstatuRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEstatuRequest $request)
	{
		$input = $request->all();

		$estatu = $this->estatuRepository->create($input);

		Flash::success('Estatu saved successfully.');

		return redirect(route('estatus.index'));
	}

	/**
	 * Display the specified Estatu.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$estatu = $this->estatuRepository->find($id);

		if(empty($estatu))
		{
			Flash::error('Estatu not found');

			return redirect(route('estatus.index'));
		}

		return view('estatus.show')->with('estatu', $estatu);
	}

	/**
	 * Show the form for editing the specified Estatu.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$estatu = $this->estatuRepository->find($id);

		if(empty($estatu))
		{
			Flash::error('Estatu not found');

			return redirect(route('estatus.index'));
		}

		return view('estatus.edit')->with('estatu', $estatu);
	}

	/**
	 * Update the specified Estatu in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEstatuRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateEstatuRequest $request)
	{
		$estatu = $this->estatuRepository->find($id);

		if(empty($estatu))
		{
			Flash::error('Estatu not found');

			return redirect(route('estatus.index'));
		}

		$estatu = $this->estatuRepository->updateRich($request->all(), $id);

		Flash::success('Estatu updated successfully.');

		return redirect(route('estatus.index'));
	}

	/**
	 * Remove the specified Estatu from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$estatu = $this->estatuRepository->find($id);

		if(empty($estatu))
		{
			Flash::error('Estatu not found');

			return redirect(route('estatus.index'));
		}

		$this->estatuRepository->delete($id);

		Flash::success('Estatu deleted successfully.');

		return redirect(route('estatus.index'));
	}
}
