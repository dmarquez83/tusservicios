<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\HorariosRepository;
use App\Models\Horarios;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class HorariosAPIController extends AppBaseController
{
	/** @var  HorariosRepository */
	private $horariosRepository;

	function __construct(HorariosRepository $horariosRepo)
	{
		$this->horariosRepository = $horariosRepo;
	}

	/**
	 * Display a listing of the Horarios.
	 * GET|HEAD /horarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$horarios = $this->horariosRepository->all();

		return $this->sendResponse($horarios->toArray(), "Horarios retrieved successfully");
	}

	/**
	 * Show the form for creating a new Horarios.
	 * GET|HEAD /horarios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Horarios in storage.
	 * POST /horarios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Horarios::$rules) > 0)
			$this->validateRequestOrFail($request, Horarios::$rules);

		$input = $request->all();

		$horarios = $this->horariosRepository->create($input);

		return $this->sendResponse($horarios->toArray(), "Horarios saved successfully");
	}

	/**
	 * Display the specified Horarios.
	 * GET|HEAD /horarios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$horarios = $this->horariosRepository->apiFindOrFail($id);

		return $this->sendResponse($horarios->toArray(), "Horarios retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Horarios.
	 * GET|HEAD /horarios/{id}/edit
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
	 * Update the specified Horarios in storage.
	 * PUT/PATCH /horarios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Horarios $horarios */
		$horarios = $this->horariosRepository->apiFindOrFail($id);

		$result = $this->horariosRepository->updateRich($input, $id);

		$horarios = $horarios->fresh();

		return $this->sendResponse($horarios->toArray(), "Horarios updated successfully");
	}

	/**
	 * Remove the specified Horarios from storage.
	 * DELETE /horarios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->horariosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Horarios deleted successfully");
	}
}
