<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\TipousuariosRepository;
use App\Models\Tipousuarios;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class TipousuariosAPIController extends AppBaseController
{
	/** @var  TipousuariosRepository */
	private $tipousuariosRepository;

	function __construct(TipousuariosRepository $tipousuariosRepo)
	{
		$this->tipousuariosRepository = $tipousuariosRepo;
	}

	/**
	 * Display a listing of the Tipousuarios.
	 * GET|HEAD /tipousuarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipousuarios = $this->tipousuariosRepository->all();

		return $this->sendResponse($tipousuarios->toArray(), "Tipousuarios retrieved successfully");
	}

	/**
	 * Show the form for creating a new Tipousuarios.
	 * GET|HEAD /tipousuarios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Tipousuarios in storage.
	 * POST /tipousuarios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Tipousuarios::$rules) > 0)
			$this->validateRequestOrFail($request, Tipousuarios::$rules);

		$input = $request->all();

		$tipousuarios = $this->tipousuariosRepository->create($input);

		return $this->sendResponse($tipousuarios->toArray(), "Tipousuarios saved successfully");
	}

	/**
	 * Display the specified Tipousuarios.
	 * GET|HEAD /tipousuarios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tipousuarios = $this->tipousuariosRepository->apiFindOrFail($id);

		return $this->sendResponse($tipousuarios->toArray(), "Tipousuarios retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Tipousuarios.
	 * GET|HEAD /tipousuarios/{id}/edit
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
	 * Update the specified Tipousuarios in storage.
	 * PUT/PATCH /tipousuarios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Tipousuarios $tipousuarios */
		$tipousuarios = $this->tipousuariosRepository->apiFindOrFail($id);

		$result = $this->tipousuariosRepository->updateRich($input, $id);

		$tipousuarios = $tipousuarios->fresh();

		return $this->sendResponse($tipousuarios->toArray(), "Tipousuarios updated successfully");
	}

	/**
	 * Remove the specified Tipousuarios from storage.
	 * DELETE /tipousuarios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->tipousuariosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Tipousuarios deleted successfully");
	}
}
