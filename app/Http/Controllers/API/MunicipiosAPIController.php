<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\MunicipiosRepository;
use App\Models\Municipios;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class MunicipiosAPIController extends AppBaseController
{
	/** @var  MunicipiosRepository */
	private $municipiosRepository;

	function __construct(MunicipiosRepository $municipiosRepo)
	{
		$this->municipiosRepository = $municipiosRepo;
	}

	/**
	 * Display a listing of the Municipios.
	 * GET|HEAD /municipios
	 *
	 * @return Response
	 */
	public function index()
	{
		$municipios = $this->municipiosRepository->all();

		return $this->sendResponse($municipios->toArray(), "Municipios retrieved successfully");
	}

	/**
	 * Show the form for creating a new Municipios.
	 * GET|HEAD /municipios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Municipios in storage.
	 * POST /municipios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Municipios::$rules) > 0)
			$this->validateRequestOrFail($request, Municipios::$rules);

		$input = $request->all();

		$municipios = $this->municipiosRepository->create($input);

		return $this->sendResponse($municipios->toArray(), "Municipios saved successfully");
	}

	/**
	 * Display the specified Municipios.
	 * GET|HEAD /municipios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$municipios = $this->municipiosRepository->apiFindOrFail($id);

		return $this->sendResponse($municipios->toArray(), "Municipios retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Municipios.
	 * GET|HEAD /municipios/{id}/edit
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
	 * Update the specified Municipios in storage.
	 * PUT/PATCH /municipios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Municipios $municipios */
		$municipios = $this->municipiosRepository->apiFindOrFail($id);

		$result = $this->municipiosRepository->updateRich($input, $id);

		$municipios = $municipios->fresh();

		return $this->sendResponse($municipios->toArray(), "Municipios updated successfully");
	}

	/**
	 * Remove the specified Municipios from storage.
	 * DELETE /municipios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->municipiosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Municipios deleted successfully");
	}
}
