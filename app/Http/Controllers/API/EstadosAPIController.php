<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\EstadosRepository;
use App\Models\Estados;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class EstadosAPIController extends AppBaseController
{
	/** @var  EstadosRepository */
	private $estadosRepository;

	function __construct(EstadosRepository $estadosRepo)
	{
		$this->estadosRepository = $estadosRepo;
	}

	/**
	 * Display a listing of the Estados.
	 * GET|HEAD /estados
	 *
	 * @return Response
	 */
	public function index()
	{
		$estados = $this->estadosRepository->all();

		return $this->sendResponse($estados->toArray(), "Estados retrieved successfully");
	}

	/**
	 * Show the form for creating a new Estados.
	 * GET|HEAD /estados/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Estados in storage.
	 * POST /estados
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Estados::$rules) > 0)
			$this->validateRequestOrFail($request, Estados::$rules);

		$input = $request->all();

		$estados = $this->estadosRepository->create($input);

		return $this->sendResponse($estados->toArray(), "Estados saved successfully");
	}

	/**
	 * Display the specified Estados.
	 * GET|HEAD /estados/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$estados = $this->estadosRepository->apiFindOrFail($id);

		return $this->sendResponse($estados->toArray(), "Estados retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Estados.
	 * GET|HEAD /estados/{id}/edit
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
	 * Update the specified Estados in storage.
	 * PUT/PATCH /estados/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Estados $estados */
		$estados = $this->estadosRepository->apiFindOrFail($id);

		$result = $this->estadosRepository->updateRich($input, $id);

		$estados = $estados->fresh();

		return $this->sendResponse($estados->toArray(), "Estados updated successfully");
	}

	/**
	 * Remove the specified Estados from storage.
	 * DELETE /estados/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->estadosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Estados deleted successfully");
	}
}
