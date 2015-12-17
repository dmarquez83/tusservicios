<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InsumosServiciosRepository;
use App\Models\InsumosServicios;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumosServiciosAPIController extends AppBaseController
{
	/** @var  InsumosServiciosRepository */
	private $insumosServiciosRepository;

	function __construct(InsumosServiciosRepository $insumosServiciosRepo)
	{
		$this->insumosServiciosRepository = $insumosServiciosRepo;
	}

	/**
	 * Display a listing of the InsumosServicios.
	 * GET|HEAD /insumosServicios
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumosServicios = $this->insumosServiciosRepository->all();

		return $this->sendResponse($insumosServicios->toArray(), "InsumosServicios retrieved successfully");
	}

	/**
	 * Show the form for creating a new InsumosServicios.
	 * GET|HEAD /insumosServicios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created InsumosServicios in storage.
	 * POST /insumosServicios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(InsumosServicios::$rules) > 0)
			$this->validateRequestOrFail($request, InsumosServicios::$rules);

		$input = $request->all();

		$insumosServicios = $this->insumosServiciosRepository->create($input);

		return $this->sendResponse($insumosServicios->toArray(), "InsumosServicios saved successfully");
	}

	/**
	 * Display the specified InsumosServicios.
	 * GET|HEAD /insumosServicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumosServicios = $this->insumosServiciosRepository->apiFindOrFail($id);

		return $this->sendResponse($insumosServicios->toArray(), "InsumosServicios retrieved successfully");
	}

	/**
	 * Show the form for editing the specified InsumosServicios.
	 * GET|HEAD /insumosServicios/{id}/edit
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
	 * Update the specified InsumosServicios in storage.
	 * PUT/PATCH /insumosServicios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var InsumosServicios $insumosServicios */
		$insumosServicios = $this->insumosServiciosRepository->apiFindOrFail($id);

		$result = $this->insumosServiciosRepository->updateRich($input, $id);

		$insumosServicios = $insumosServicios->fresh();

		return $this->sendResponse($insumosServicios->toArray(), "InsumosServicios updated successfully");
	}

	/**
	 * Remove the specified InsumosServicios from storage.
	 * DELETE /insumosServicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->insumosServiciosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "InsumosServicios deleted successfully");
	}
}
