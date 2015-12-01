<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ProveedoresInsumosRepository;
use App\Models\ProveedoresInsumos;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProveedoresInsumosAPIController extends AppBaseController
{
	/** @var  ProveedoresInsumosRepository */
	private $proveedoresInsumosRepository;

	function __construct(ProveedoresInsumosRepository $proveedoresInsumosRepo)
	{
		$this->proveedoresInsumosRepository = $proveedoresInsumosRepo;
	}

	/**
	 * Display a listing of the ProveedoresInsumos.
	 * GET|HEAD /proveedoresInsumos
	 *
	 * @return Response
	 */
	public function index()
	{
		$proveedoresInsumos = $this->proveedoresInsumosRepository->all();

		return $this->sendResponse($proveedoresInsumos->toArray(), "ProveedoresInsumos retrieved successfully");
	}

	/**
	 * Show the form for creating a new ProveedoresInsumos.
	 * GET|HEAD /proveedoresInsumos/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ProveedoresInsumos in storage.
	 * POST /proveedoresInsumos
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ProveedoresInsumos::$rules) > 0)
			$this->validateRequestOrFail($request, ProveedoresInsumos::$rules);

		$input = $request->all();

		$proveedoresInsumos = $this->proveedoresInsumosRepository->create($input);

		return $this->sendResponse($proveedoresInsumos->toArray(), "ProveedoresInsumos saved successfully");
	}

	/**
	 * Display the specified ProveedoresInsumos.
	 * GET|HEAD /proveedoresInsumos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$proveedoresInsumos = $this->proveedoresInsumosRepository->apiFindOrFail($id);

		return $this->sendResponse($proveedoresInsumos->toArray(), "ProveedoresInsumos retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ProveedoresInsumos.
	 * GET|HEAD /proveedoresInsumos/{id}/edit
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
	 * Update the specified ProveedoresInsumos in storage.
	 * PUT/PATCH /proveedoresInsumos/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ProveedoresInsumos $proveedoresInsumos */
		$proveedoresInsumos = $this->proveedoresInsumosRepository->apiFindOrFail($id);

		$result = $this->proveedoresInsumosRepository->updateRich($input, $id);

		$proveedoresInsumos = $proveedoresInsumos->fresh();

		return $this->sendResponse($proveedoresInsumos->toArray(), "ProveedoresInsumos updated successfully");
	}

	/**
	 * Remove the specified ProveedoresInsumos from storage.
	 * DELETE /proveedoresInsumos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->proveedoresInsumosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ProveedoresInsumos deleted successfully");
	}
}
