<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\TiposervicioRepository;
use App\Models\Tiposervicio;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class TiposervicioAPIController extends AppBaseController
{
	/** @var  TiposervicioRepository */
	private $tiposervicioRepository;

	function __construct(TiposervicioRepository $tiposervicioRepo)
	{
		$this->tiposervicioRepository = $tiposervicioRepo;
	}

	/**
	 * Display a listing of the Tiposervicio.
	 * GET|HEAD /tiposervicios
	 *
	 * @return Response
	 */
	public function index()
	{
		$tiposervicios = $this->tiposervicioRepository->all();

		return $this->sendResponse($tiposervicios->toArray(), "Tiposervicios retrieved successfully");
	}

	/**
	 * Show the form for creating a new Tiposervicio.
	 * GET|HEAD /tiposervicios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Tiposervicio in storage.
	 * POST /tiposervicios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Tiposervicio::$rules) > 0)
			$this->validateRequestOrFail($request, Tiposervicio::$rules);

		$input = $request->all();

		$tiposervicios = $this->tiposervicioRepository->create($input);

		return $this->sendResponse($tiposervicios->toArray(), "Tiposervicio saved successfully");
	}

	/**
	 * Display the specified Tiposervicio.
	 * GET|HEAD /tiposervicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tiposervicio = $this->tiposervicioRepository->apiFindOrFail($id);

		return $this->sendResponse($tiposervicio->toArray(), "Tiposervicio retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Tiposervicio.
	 * GET|HEAD /tiposervicios/{id}/edit
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
	 * Update the specified Tiposervicio in storage.
	 * PUT/PATCH /tiposervicios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Tiposervicio $tiposervicio */
		$tiposervicio = $this->tiposervicioRepository->apiFindOrFail($id);

		$result = $this->tiposervicioRepository->updateRich($input, $id);

		$tiposervicio = $tiposervicio->fresh();

		return $this->sendResponse($tiposervicio->toArray(), "Tiposervicio updated successfully");
	}

	/**
	 * Remove the specified Tiposervicio from storage.
	 * DELETE /tiposervicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->tiposervicioRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Tiposervicio deleted successfully");
	}
}
