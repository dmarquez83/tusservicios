<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\fernandoRepository;
use App\Models\fernando;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class fernandoAPIController extends AppBaseController
{
	/** @var  fernandoRepository */
	private $fernandoRepository;

	function __construct(fernandoRepository $fernandoRepo)
	{
		$this->fernandoRepository = $fernandoRepo;
	}

	/**
	 * Display a listing of the fernando.
	 * GET|HEAD /fernandos
	 *
	 * @return Response
	 */
	public function index()
	{
		$fernandos = $this->fernandoRepository->all();

		return $this->sendResponse($fernandos->toArray(), "fernandos retrieved successfully");
	}

	/**
	 * Show the form for creating a new fernando.
	 * GET|HEAD /fernandos/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created fernando in storage.
	 * POST /fernandos
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(fernando::$rules) > 0)
			$this->validateRequestOrFail($request, fernando::$rules);

		$input = $request->all();

		$fernandos = $this->fernandoRepository->create($input);

		return $this->sendResponse($fernandos->toArray(), "fernando saved successfully");
	}

	/**
	 * Display the specified fernando.
	 * GET|HEAD /fernandos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fernando = $this->fernandoRepository->apiFindOrFail($id);

		return $this->sendResponse($fernando->toArray(), "fernando retrieved successfully");
	}

	/**
	 * Show the form for editing the specified fernando.
	 * GET|HEAD /fernandos/{id}/edit
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
	 * Update the specified fernando in storage.
	 * PUT/PATCH /fernandos/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var fernando $fernando */
		$fernando = $this->fernandoRepository->apiFindOrFail($id);

		$result = $this->fernandoRepository->updateRich($input, $id);

		$fernando = $fernando->fresh();

		return $this->sendResponse($fernando->toArray(), "fernando updated successfully");
	}

	/**
	 * Remove the specified fernando from storage.
	 * DELETE /fernandos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->fernandoRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "fernando deleted successfully");
	}
}
