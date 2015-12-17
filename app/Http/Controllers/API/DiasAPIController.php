<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\DiasRepository;
use App\Models\Dias;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class DiasAPIController extends AppBaseController
{
	/** @var  DiasRepository */
	private $diasRepository;

	function __construct(DiasRepository $diasRepo)
	{
		$this->diasRepository = $diasRepo;
	}

	/**
	 * Display a listing of the Dias.
	 * GET|HEAD /dias
	 *
	 * @return Response
	 */
	public function index()
	{
		$dias = $this->diasRepository->all();

		return $this->sendResponse($dias->toArray(), "Dias retrieved successfully");
	}

	/**
	 * Show the form for creating a new Dias.
	 * GET|HEAD /dias/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Dias in storage.
	 * POST /dias
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Dias::$rules) > 0)
			$this->validateRequestOrFail($request, Dias::$rules);

		$input = $request->all();

		$dias = $this->diasRepository->create($input);

		return $this->sendResponse($dias->toArray(), "Dias saved successfully");
	}

	/**
	 * Display the specified Dias.
	 * GET|HEAD /dias/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$dias = $this->diasRepository->apiFindOrFail($id);

		return $this->sendResponse($dias->toArray(), "Dias retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Dias.
	 * GET|HEAD /dias/{id}/edit
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
	 * Update the specified Dias in storage.
	 * PUT/PATCH /dias/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Dias $dias */
		$dias = $this->diasRepository->apiFindOrFail($id);

		$result = $this->diasRepository->updateRich($input, $id);

		$dias = $dias->fresh();

		return $this->sendResponse($dias->toArray(), "Dias updated successfully");
	}

	/**
	 * Remove the specified Dias from storage.
	 * DELETE /dias/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->diasRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Dias deleted successfully");
	}
}
