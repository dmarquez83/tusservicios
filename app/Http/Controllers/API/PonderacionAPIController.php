<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PonderacionRepository;
use App\Models\Ponderacion;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PonderacionAPIController extends AppBaseController
{
	/** @var  PonderacionRepository */
	private $ponderacionRepository;

	function __construct(PonderacionRepository $ponderacionRepo)
	{
		$this->ponderacionRepository = $ponderacionRepo;
	}

	/**
	 * Display a listing of the Ponderacion.
	 * GET|HEAD /ponderacions
	 *
	 * @return Response
	 */
	public function index()
	{
		$ponderacions = $this->ponderacionRepository->all();

		return $this->sendResponse($ponderacions->toArray(), "Ponderacions retrieved successfully");
	}

	/**
	 * Show the form for creating a new Ponderacion.
	 * GET|HEAD /ponderacions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Ponderacion in storage.
	 * POST /ponderacions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Ponderacion::$rules) > 0)
			$this->validateRequestOrFail($request, Ponderacion::$rules);

		$input = $request->all();

		$ponderacions = $this->ponderacionRepository->create($input);

		return $this->sendResponse($ponderacions->toArray(), "Ponderacion saved successfully");
	}

	/**
	 * Display the specified Ponderacion.
	 * GET|HEAD /ponderacions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ponderacion = $this->ponderacionRepository->apiFindOrFail($id);

		return $this->sendResponse($ponderacion->toArray(), "Ponderacion retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Ponderacion.
	 * GET|HEAD /ponderacions/{id}/edit
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
	 * Update the specified Ponderacion in storage.
	 * PUT/PATCH /ponderacions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Ponderacion $ponderacion */
		$ponderacion = $this->ponderacionRepository->apiFindOrFail($id);

		$result = $this->ponderacionRepository->updateRich($input, $id);

		$ponderacion = $ponderacion->fresh();

		return $this->sendResponse($ponderacion->toArray(), "Ponderacion updated successfully");
	}

	/**
	 * Remove the specified Ponderacion from storage.
	 * DELETE /ponderacions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->ponderacionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Ponderacion deleted successfully");
	}
}
