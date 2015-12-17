<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CatalogosInsumosRepository;
use App\Models\CatalogosInsumos;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CatalogosInsumosAPIController extends AppBaseController
{
	/** @var  CatalogosInsumosRepository */
	private $catalogosInsumosRepository;

	function __construct(CatalogosInsumosRepository $catalogosInsumosRepo)
	{
		$this->catalogosInsumosRepository = $catalogosInsumosRepo;
	}

	/**
	 * Display a listing of the CatalogosInsumos.
	 * GET|HEAD /catalogosInsumos
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogosInsumos = $this->catalogosInsumosRepository->all();

		return $this->sendResponse($catalogosInsumos->toArray(), "CatalogosInsumos retrieved successfully");
	}

	/**
	 * Show the form for creating a new CatalogosInsumos.
	 * GET|HEAD /catalogosInsumos/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created CatalogosInsumos in storage.
	 * POST /catalogosInsumos
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(CatalogosInsumos::$rules) > 0)
			$this->validateRequestOrFail($request, CatalogosInsumos::$rules);

		$input = $request->all();

		$catalogosInsumos = $this->catalogosInsumosRepository->create($input);

		return $this->sendResponse($catalogosInsumos->toArray(), "CatalogosInsumos saved successfully");
	}

	/**
	 * Display the specified CatalogosInsumos.
	 * GET|HEAD /catalogosInsumos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$catalogosInsumos = $this->catalogosInsumosRepository->apiFindOrFail($id);

		return $this->sendResponse($catalogosInsumos->toArray(), "CatalogosInsumos retrieved successfully");
	}

	/**
	 * Show the form for editing the specified CatalogosInsumos.
	 * GET|HEAD /catalogosInsumos/{id}/edit
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
	 * Update the specified CatalogosInsumos in storage.
	 * PUT/PATCH /catalogosInsumos/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var CatalogosInsumos $catalogosInsumos */
		$catalogosInsumos = $this->catalogosInsumosRepository->apiFindOrFail($id);

		$result = $this->catalogosInsumosRepository->updateRich($input, $id);

		$catalogosInsumos = $catalogosInsumos->fresh();

		return $this->sendResponse($catalogosInsumos->toArray(), "CatalogosInsumos updated successfully");
	}

	/**
	 * Remove the specified CatalogosInsumos from storage.
	 * DELETE /catalogosInsumos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->catalogosInsumosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "CatalogosInsumos deleted successfully");
	}
}
