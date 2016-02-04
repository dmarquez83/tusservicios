<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CiudadRepository;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CiudadAPIController extends AppBaseController
{
	/** @var  CiudadRepository */
	private $ciudadRepository;

	function __construct(CiudadRepository $ciudadRepo)
	{
		$this->ciudadRepository = $ciudadRepo;
	}

	/**
	 * Display a listing of the Ciudad.
	 * GET|HEAD /ciudades
	 *
	 * @return Response
	 */
	public function index()
	{
		$ciudads = $this->ciudadRepository->all();

		return $this->sendResponse($ciudads->toArray(), "Ciudads retrieved successfully");
	}

	/**
	 * Show the form for creating a new Ciudad.
	 * GET|HEAD /ciudades/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Ciudad in storage.
	 * POST /ciudades
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Ciudad::$rules) > 0)
			$this->validateRequestOrFail($request, Ciudad::$rules);

		$input = $request->all();

		$ciudads = $this->ciudadRepository->create($input);

		return $this->sendResponse($ciudads->toArray(), "Ciudad saved successfully");
	}

	/**
	 * Display the specified Ciudad.
	 * GET|HEAD /ciudades/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ciudad = $this->ciudadRepository->apiFindOrFail($id);

		return $this->sendResponse($ciudad->toArray(), "Ciudad retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Ciudad.
	 * GET|HEAD /ciudades/{id}/edit
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
	 * Update the specified Ciudad in storage.
	 * PUT/PATCH /ciudades/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Ciudad $ciudad */
		$ciudad = $this->ciudadRepository->apiFindOrFail($id);

		$result = $this->ciudadRepository->updateRich($input, $id);

		$ciudad = $ciudad->fresh();

		return $this->sendResponse($ciudad->toArray(), "Ciudad updated successfully");
	}

	/**
	 * Remove the specified Ciudad from storage.
	 * DELETE /ciudades/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->ciudadRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Ciudad deleted successfully");
	}
}
