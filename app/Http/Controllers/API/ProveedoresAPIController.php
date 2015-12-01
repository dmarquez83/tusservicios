<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ProveedoresRepository;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProveedoresAPIController extends AppBaseController
{
	/** @var  ProveedoresRepository */
	private $proveedoresRepository;

	function __construct(ProveedoresRepository $proveedoresRepo)
	{
		$this->proveedoresRepository = $proveedoresRepo;
	}

	/**
	 * Display a listing of the Proveedores.
	 * GET|HEAD /proveedores
	 *
	 * @return Response
	 */
	public function index()
	{
		$proveedores = $this->proveedoresRepository->all();

		return $this->sendResponse($proveedores->toArray(), "Proveedores retrieved successfully");
	}

	/**
	 * Show the form for creating a new Proveedores.
	 * GET|HEAD /proveedores/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Proveedores in storage.
	 * POST /proveedores
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Proveedores::$rules) > 0)
			$this->validateRequestOrFail($request, Proveedores::$rules);

		$input = $request->all();

		$proveedores = $this->proveedoresRepository->create($input);

		return $this->sendResponse($proveedores->toArray(), "Proveedores saved successfully");
	}

	/**
	 * Display the specified Proveedores.
	 * GET|HEAD /proveedores/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$proveedores = $this->proveedoresRepository->apiFindOrFail($id);

		return $this->sendResponse($proveedores->toArray(), "Proveedores retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Proveedores.
	 * GET|HEAD /proveedores/{id}/edit
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
	 * Update the specified Proveedores in storage.
	 * PUT/PATCH /proveedores/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Proveedores $proveedores */
		$proveedores = $this->proveedoresRepository->apiFindOrFail($id);

		$result = $this->proveedoresRepository->updateRich($input, $id);

		$proveedores = $proveedores->fresh();

		return $this->sendResponse($proveedores->toArray(), "Proveedores updated successfully");
	}

	/**
	 * Remove the specified Proveedores from storage.
	 * DELETE /proveedores/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->proveedoresRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Proveedores deleted successfully");
	}
}
