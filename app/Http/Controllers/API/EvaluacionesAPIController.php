<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\EvaluacionesRepository;
use App\Models\Evaluaciones;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class EvaluacionesAPIController extends AppBaseController
{
	/** @var  EvaluacionesRepository */
	private $evaluacionesRepository;

	function __construct(EvaluacionesRepository $evaluacionesRepo)
	{
		$this->evaluacionesRepository = $evaluacionesRepo;
	}

	/**
	 * Display a listing of the Evaluaciones.
	 * GET|HEAD /evaluaciones
	 *
	 * @return Response
	 */
	public function index()
	{
		$evaluaciones = $this->evaluacionesRepository->all();

		return $this->sendResponse($evaluaciones->toArray(), "Evaluaciones retrieved successfully");
	}

	/**
	 * Show the form for creating a new Evaluaciones.
	 * GET|HEAD /evaluaciones/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Evaluaciones in storage.
	 * POST /evaluaciones
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Evaluaciones::$rules) > 0)
			$this->validateRequestOrFail($request, Evaluaciones::$rules);

		$input = $request->all();

		$evaluaciones = $this->evaluacionesRepository->create($input);

		return $this->sendResponse($evaluaciones->toArray(), "Evaluaciones saved successfully");
	}

	/**
	 * Display the specified Evaluaciones.
	 * GET|HEAD /evaluaciones/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$evaluaciones = $this->evaluacionesRepository->apiFindOrFail($id);

		return $this->sendResponse($evaluaciones->toArray(), "Evaluaciones retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Evaluaciones.
	 * GET|HEAD /evaluaciones/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified Evaluaciones in storage.
	 * PUT/PATCH /evaluaciones/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Evaluaciones $evaluaciones */
		$evaluaciones = $this->evaluacionesRepository->apiFindOrFail($id);

		$result = $this->evaluacionesRepository->updateRich($input, $id);

		$evaluaciones = $evaluaciones->fresh();

		return $this->sendResponse($evaluaciones->toArray(), "Evaluaciones updated successfully");
	}

	/**
	 * Remove the specified Evaluaciones from storage.
	 * DELETE /evaluaciones/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->evaluacionesRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Evaluaciones deleted successfully");
	}
}
