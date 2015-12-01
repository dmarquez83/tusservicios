<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\HorasRepository;
use App\Models\Horas;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class HorasAPIController extends AppBaseController
{
	/** @var  HorasRepository */
	private $horasRepository;

	function __construct(HorasRepository $horasRepo)
	{
		$this->horasRepository = $horasRepo;
	}

	/**
	 * Display a listing of the Horas.
	 * GET|HEAD /horas
	 *
	 * @return Response
	 */
	public function index()
	{
		$horas = $this->horasRepository->all();

		return $this->sendResponse($horas->toArray(), "Horas retrieved successfully");
	}

	/**
	 * Show the form for creating a new Horas.
	 * GET|HEAD /horas/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Horas in storage.
	 * POST /horas
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Horas::$rules) > 0)
			$this->validateRequestOrFail($request, Horas::$rules);

		$input = $request->all();

		$horas = $this->horasRepository->create($input);

		return $this->sendResponse($horas->toArray(), "Horas saved successfully");
	}

	/**
	 * Display the specified Horas.
	 * GET|HEAD /horas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$horas = $this->horasRepository->apiFindOrFail($id);

		return $this->sendResponse($horas->toArray(), "Horas retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Horas.
	 * GET|HEAD /horas/{id}/edit
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
	 * Update the specified Horas in storage.
	 * PUT/PATCH /horas/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Horas $horas */
		$horas = $this->horasRepository->apiFindOrFail($id);

		$result = $this->horasRepository->updateRich($input, $id);

		$horas = $horas->fresh();

		return $this->sendResponse($horas->toArray(), "Horas updated successfully");
	}

	/**
	 * Remove the specified Horas from storage.
	 * DELETE /horas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->horasRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Horas deleted successfully");
	}
}
