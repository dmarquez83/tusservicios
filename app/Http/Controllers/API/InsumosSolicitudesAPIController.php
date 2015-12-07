<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InsumosSolicitudesRepository;
use App\Models\InsumosSolicitudes;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumosSolicitudesAPIController extends AppBaseController
{
	/** @var  InsumosSolicitudesRepository */
	private $insumosSolicitudesRepository;

	function __construct(InsumosSolicitudesRepository $insumosSolicitudesRepo)
	{
		$this->insumosSolicitudesRepository = $insumosSolicitudesRepo;
	}

	/**
	 * Display a listing of the InsumosSolicitudes.
	 * GET|HEAD /insumosSolicitudes
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumosSolicitudes = $this->insumosSolicitudesRepository->all();

		return $this->sendResponse($insumosSolicitudes->toArray(), "InsumosSolicitudes retrieved successfully");
	}

	/**
	 * Show the form for creating a new InsumosSolicitudes.
	 * GET|HEAD /insumosSolicitudes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created InsumosSolicitudes in storage.
	 * POST /insumosSolicitudes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(InsumosSolicitudes::$rules) > 0)
			$this->validateRequestOrFail($request, InsumosSolicitudes::$rules);

		$input = $request->all();

		$insumosSolicitudes = $this->insumosSolicitudesRepository->create($input);

		return $this->sendResponse($insumosSolicitudes->toArray(), "InsumosSolicitudes saved successfully");
	}

	/**
	 * Display the specified InsumosSolicitudes.
	 * GET|HEAD /insumosSolicitudes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumosSolicitudes = $this->insumosSolicitudesRepository->apiFindOrFail($id);

		return $this->sendResponse($insumosSolicitudes->toArray(), "InsumosSolicitudes retrieved successfully");
	}

	/**
	 * Show the form for editing the specified InsumosSolicitudes.
	 * GET|HEAD /insumosSolicitudes/{id}/edit
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
	 * Update the specified InsumosSolicitudes in storage.
	 * PUT/PATCH /insumosSolicitudes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var InsumosSolicitudes $insumosSolicitudes */
		$insumosSolicitudes = $this->insumosSolicitudesRepository->apiFindOrFail($id);

		$result = $this->insumosSolicitudesRepository->updateRich($input, $id);

		$insumosSolicitudes = $insumosSolicitudes->fresh();

		return $this->sendResponse($insumosSolicitudes->toArray(), "InsumosSolicitudes updated successfully");
	}

	/**
	 * Remove the specified InsumosSolicitudes from storage.
	 * DELETE /insumosSolicitudes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->insumosSolicitudesRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "InsumosSolicitudes deleted successfully");
	}
}
