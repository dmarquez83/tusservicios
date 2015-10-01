<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ServiciosRepository;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ServiciosAPIController extends AppBaseController
{
	/** @var  ServiciosRepository */
	private $serviciosRepository;

	function __construct(ServiciosRepository $serviciosRepo)
	{
		$this->serviciosRepository = $serviciosRepo;
	}

	/**
	 * Display a listing of the Servicios.
	 * GET|HEAD /servicios
	 *
	 * @return Response
	 */
	public function index()
	{
		$servicios = $this->serviciosRepository->all();

		return $this->sendResponse($servicios->toArray(), "Servicios retrieved successfully");
	}

	/**
	 * Show the form for creating a new Servicios.
	 * GET|HEAD /servicios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Servicios in storage.
	 * POST /servicios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Servicios::$rules) > 0)
			$this->validateRequestOrFail($request, Servicios::$rules);

		$input = $request->all();

		$servicios = $this->serviciosRepository->create($input);

		return $this->sendResponse($servicios->toArray(), "Servicios saved successfully");
	}

	/**
	 * Display the specified Servicios.
	 * GET|HEAD /servicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$servicios = $this->serviciosRepository->apiFindOrFail($id);

		return $this->sendResponse($servicios->toArray(), "Servicios retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Servicios.
	 * GET|HEAD /servicios/{id}/edit
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
	 * Update the specified Servicios in storage.
	 * PUT/PATCH /servicios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Servicios $servicios */
		$servicios = $this->serviciosRepository->apiFindOrFail($id);

		$result = $this->serviciosRepository->updateRich($input, $id);

		$servicios = $servicios->fresh();

		return $this->sendResponse($servicios->toArray(), "Servicios updated successfully");
	}

	/**
	 * Remove the specified Servicios from storage.
	 * DELETE /servicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->serviciosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Servicios deleted successfully");
	}
}
