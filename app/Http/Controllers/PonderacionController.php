<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePonderacionRequest;
use App\Http\Requests\UpdatePonderacionRequest;
use App\Libraries\Repositories\PonderacionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PonderacionController extends AppBaseController
{

	/** @var  PonderacionRepository */
	private $ponderacionRepository;

	function __construct(PonderacionRepository $ponderacionRepo)
	{
		$this->ponderacionRepository = $ponderacionRepo;
	}

	/**
	 * Display a listing of the Ponderacion.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ponderacions = $this->ponderacionRepository->paginate(10);

		return view('ponderacions.index')
			->with('ponderacions', $ponderacions);
	}

	/**
	 * Show the form for creating a new Ponderacion.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ponderacions.create');
	}

	/**
	 * Store a newly created Ponderacion in storage.
	 *
	 * @param CreatePonderacionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePonderacionRequest $request)
	{
		$input = $request->all();

		$ponderacion = $this->ponderacionRepository->create($input);

		Flash::success('Ponderacion saved successfully.');

		return redirect(route('ponderacions.index'));
	}

	/**
	 * Display the specified Ponderacion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion not found');

			return redirect(route('ponderacions.index'));
		}

		return view('ponderacions.show')->with('ponderacion', $ponderacion);
	}

	/**
	 * Show the form for editing the specified Ponderacion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion not found');

			return redirect(route('ponderacions.index'));
		}

		return view('ponderacions.edit')->with('ponderacion', $ponderacion);
	}

	/**
	 * Update the specified Ponderacion in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePonderacionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePonderacionRequest $request)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion not found');

			return redirect(route('ponderacions.index'));
		}

		$ponderacion = $this->ponderacionRepository->updateRich($request->all(), $id);

		Flash::success('Ponderacion updated successfully.');

		return redirect(route('ponderacions.index'));
	}

	/**
	 * Remove the specified Ponderacion from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion not found');

			return redirect(route('ponderacions.index'));
		}

		$this->ponderacionRepository->delete($id);

		Flash::success('Ponderacion deleted successfully.');

		return redirect(route('ponderacions.index'));
	}
}
