<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEvaluacionesRequest;
use App\Http\Requests\UpdateEvaluacionesRequest;
use App\Libraries\Repositories\EvaluacionesRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class EvaluacionesController extends AppBaseController
{

	/** @var  EvaluacionesRepository */
	private $evaluacionesRepository;

	function __construct(EvaluacionesRepository $evaluacionesRepo)
	{
		$this->evaluacionesRepository = $evaluacionesRepo;
	}

	/**
	 * Display a listing of the Evaluaciones.
	 *
	 * @return Response
	 */
	public function index()
	{
		$evaluaciones = $this->evaluacionesRepository->paginate(10);

		return view('modulos.evaluaciones.index')
			->with('evaluaciones', $evaluaciones);

	 // return response()->json($evaluaciones);
	}

	/**
	 * Show the form for creating a new Evaluaciones.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('modulos.evaluaciones.create');
	}

	/**
	 * Store a newly created Evaluaciones in storage.
	 *
	 * @param CreateEvaluacionesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEvaluacionesRequest $request)
	{
		$input = $request->all();

		$evaluaciones = $this->evaluacionesRepository->create($input);

		Flash::success('Evaluaciones saved successfully.');

		return redirect(route('admin.evaluaciones.index'));
	}

	/**
	 * Display the specified Evaluaciones.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$evaluaciones = $this->evaluacionesRepository->find($id);

		if(empty($evaluaciones))
		{
			Flash::error('Evaluaciones not found');

			return redirect(route('admin.evaluaciones.index'));
		}

		return view('evaluaciones.show')->with('evaluaciones', $evaluaciones);
	}

	/**
	 * Show the form for editing the specified Evaluaciones.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$evaluaciones = $this->evaluacionesRepository->find($id);

		if(empty($evaluaciones))
		{
			Flash::error('Evaluaciones not found');

			return redirect(route('admin.evaluaciones.index'));
		}

		return view('modulos.evaluaciones.edit')->with('evaluaciones', $evaluaciones);
	}

	/**
	 * Update the specified Evaluaciones in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEvaluacionesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateEvaluacionesRequest $request)
	{
		$evaluaciones = $this->evaluacionesRepository->find($id);

		if(empty($evaluaciones))
		{
			Flash::error('Evaluaciones not found');

			return redirect(route('admin.evaluaciones.index'));
		}

		$evaluaciones = $this->evaluacionesRepository->updateRich($request->all(), $id);

		Flash::success('Evaluaciones updated successfully.');

		return redirect(route('admin.evaluaciones.index'));
	}

	/**
	 * Remove the specified Evaluaciones from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$evaluaciones = $this->evaluacionesRepository->find($id);

		if(empty($evaluaciones))
		{
			Flash::error('Evaluaciones not found');

			return redirect(route('admin.evaluaciones.index'));
		}

		$this->evaluacionesRepository->delete($id);

		Flash::success('Evaluaciones deleted successfully.');

		return redirect(route('admin.evaluaciones.index'));
	}
}
