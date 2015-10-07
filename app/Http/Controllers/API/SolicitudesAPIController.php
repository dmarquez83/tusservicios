<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SolicitudesRepository;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SolicitudesAPIController extends AppBaseController
{
	/** @var  SolicitudesRepository */
	private $solicitudesRepository;

	function __construct(SolicitudesRepository $solicitudesRepo)
	{
		$this->solicitudesRepository = $solicitudesRepo;
	}

	/**
	 * Display a listing of the Solicitudes.
	 * GET|HEAD /solicitudes
	 *
	 * @return Response
	 */
	public function index()
	{
		$solicitudes = $this->solicitudesRepository->all();

		return $this->sendResponse($solicitudes->toArray(), "Solicitudes retrieved successfully");
	}

	/**
	 * Show the form for creating a new Solicitudes.
	 * GET|HEAD /solicitudes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Solicitudes in storage.
	 * POST /solicitudes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Solicitudes::$rules) > 0)
			$this->validateRequestOrFail($request, Solicitudes::$rules);

		$input = $request->all();

		$solicitudes = $this->solicitudesRepository->create($input);

		return $this->sendResponse($solicitudes->toArray(), "Solicitudes saved successfully");
	}

	/**
	 * Display the specified Solicitudes.
	 * GET|HEAD /solicitudes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$solicitudes = $this->solicitudesRepository->apiFindOrFail($id);

		return $this->sendResponse($solicitudes->toArray(), "Solicitudes retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Solicitudes.
	 * GET|HEAD /solicitudes/{id}/edit
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
	 * Update the specified Solicitudes in storage.
	 * PUT/PATCH /solicitudes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Solicitudes $solicitudes */
		$solicitudes = $this->solicitudesRepository->apiFindOrFail($id);

		$result = $this->solicitudesRepository->updateRich($input, $id);

		$solicitudes = $solicitudes->fresh();

		return $this->sendResponse($solicitudes->toArray(), "Solicitudes updated successfully");
	}

	/**
	 * Remove the specified Solicitudes from storage.
	 * DELETE /solicitudes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->solicitudesRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Solicitudes deleted successfully");
	}
}
