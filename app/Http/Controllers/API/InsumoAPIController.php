<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InsumoRepository;
use App\Models\Insumo;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumoAPIController extends AppBaseController
{
	/** @var  InsumoRepository */
	private $insumoRepository;

	function __construct(InsumoRepository $insumoRepo)
	{
		$this->insumoRepository = $insumoRepo;
	}

	/**
	 * Display a listing of the Insumo.
	 * GET|HEAD /insumos
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumos = $this->insumoRepository->all();

		return $this->sendResponse($insumos->toArray(), "Insumos retrieved successfully");
	}

	/**
	 * Show the form for creating a new Insumo.
	 * GET|HEAD /insumos/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Insumo in storage.
	 * POST /insumos
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Insumo::$rules) > 0)
			$this->validateRequestOrFail($request, Insumo::$rules);

		$input = $request->all();

		$insumos = $this->insumoRepository->create($input);

		return $this->sendResponse($insumos->toArray(), "Insumo saved successfully");
	}

	/**
	 * Display the specified Insumo.
	 * GET|HEAD /insumos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumo = $this->insumoRepository->apiFindOrFail($id);

		return $this->sendResponse($insumo->toArray(), "Insumo retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Insumo.
	 * GET|HEAD /insumos/{id}/edit
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
	 * Update the specified Insumo in storage.
	 * PUT/PATCH /insumos/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Insumo $insumo */
		$insumo = $this->insumoRepository->apiFindOrFail($id);

		$result = $this->insumoRepository->updateRich($input, $id);

		$insumo = $insumo->fresh();

		return $this->sendResponse($insumo->toArray(), "Insumo updated successfully");
	}

	/**
	 * Remove the specified Insumo from storage.
	 * DELETE /insumos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->insumoRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Insumo deleted successfully");
	}
}
