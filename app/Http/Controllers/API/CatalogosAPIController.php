<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CatalogosRepository;
use App\Models\Catalogos;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CatalogosAPIController extends AppBaseController
{
	/** @var  CatalogosRepository */
	private $catalogosRepository;

	function __construct(CatalogosRepository $catalogosRepo)
	{
		$this->catalogosRepository = $catalogosRepo;
	}

	/**
	 * Display a listing of the Catalogos.
	 * GET|HEAD /catalogos
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogos = $this->catalogosRepository->all();

		return $this->sendResponse($catalogos->toArray(), "Catalogos retrieved successfully");
	}

	/**
	 * Show the form for creating a new Catalogos.
	 * GET|HEAD /catalogos/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Catalogos in storage.
	 * POST /catalogos
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Catalogos::$rules) > 0)
			$this->validateRequestOrFail($request, Catalogos::$rules);

		$input = $request->all();

		$catalogos = $this->catalogosRepository->create($input);

		return $this->sendResponse($catalogos->toArray(), "Catalogos saved successfully");
	}

	/**
	 * Display the specified Catalogos.
	 * GET|HEAD /catalogos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$catalogos = $this->catalogosRepository->apiFindOrFail($id);

		return $this->sendResponse($catalogos->toArray(), "Catalogos retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Catalogos.
	 * GET|HEAD /catalogos/{id}/edit
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
	 * Update the specified Catalogos in storage.
	 * PUT/PATCH /catalogos/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Catalogos $catalogos */
		$catalogos = $this->catalogosRepository->apiFindOrFail($id);

		$result = $this->catalogosRepository->updateRich($input, $id);

		$catalogos = $catalogos->fresh();

		return $this->sendResponse($catalogos->toArray(), "Catalogos updated successfully");
	}

	/**
	 * Remove the specified Catalogos from storage.
	 * DELETE /catalogos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->catalogosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Catalogos deleted successfully");
	}
}
