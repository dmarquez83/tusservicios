<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\EstatuRepository;
use App\Models\Estatu;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class EstatuAPIController extends AppBaseController
{
	/** @var  EstatuRepository */
	private $estatuRepository;

	function __construct(EstatuRepository $estatuRepo)
	{
		$this->estatuRepository = $estatuRepo;
	}

	/**
	 * Display a listing of the Estatu.
	 * GET|HEAD /estatus
	 *
	 * @return Response
	 */
	public function index()
	{
		$estatus = $this->estatuRepository->all();

		//return $this->sendResponse($estatus->toArray(), "Estatus retrieved successfully");
	  return response()->json($estatus);
	}

	/**
	 * Show the form for creating a new Estatu.
	 * GET|HEAD /estatus/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Estatu in storage.
	 * POST /estatus
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Estatu::$rules) > 0)
			$this->validateRequestOrFail($request, Estatu::$rules);

		$input = $request->all();

		$estatus = $this->estatuRepository->create($input);

		return $this->sendResponse($estatus->toArray(), "Estatu saved successfully");
	}

	/**
	 * Display the specified Estatu.
	 * GET|HEAD /estatus/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$estatu = $this->estatuRepository->apiFindOrFail($id);

		return $this->sendResponse($estatu->toArray(), "Estatu retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Estatu.
	 * GET|HEAD /estatus/{id}/edit
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
	 * Update the specified Estatu in storage.
	 * PUT/PATCH /estatus/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Estatu $estatu */
		$estatu = $this->estatuRepository->apiFindOrFail($id);

		$result = $this->estatuRepository->updateRich($input, $id);

		$estatu = $estatu->fresh();

		return $this->sendResponse($estatu->toArray(), "Estatu updated successfully");
	}

	/**
	 * Remove the specified Estatu from storage.
	 * DELETE /estatus/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->estatuRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Estatu deleted successfully");
	}
}
