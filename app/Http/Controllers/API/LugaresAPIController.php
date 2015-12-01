<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\LugaresRepository;
use App\Models\Lugares;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class LugaresAPIController extends AppBaseController
{
	/** @var  LugaresRepository */
	private $lugaresRepository;

	function __construct(LugaresRepository $lugaresRepo)
	{
		$this->lugaresRepository = $lugaresRepo;
	}

	/**
	 * Display a listing of the Lugares.
	 * GET|HEAD /lugares
	 *
	 * @return Response
	 */
	public function index()
	{
		$lugares = $this->lugaresRepository->all();

		return $this->sendResponse($lugares->toArray(), "Lugares retrieved successfully");
	}

	/**
	 * Show the form for creating a new Lugares.
	 * GET|HEAD /lugares/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Lugares in storage.
	 * POST /lugares
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Lugares::$rules) > 0)
			$this->validateRequestOrFail($request, Lugares::$rules);

		$input = $request->all();

		$lugares = $this->lugaresRepository->create($input);

		return $this->sendResponse($lugares->toArray(), "Lugares saved successfully");
	}

	/**
	 * Display the specified Lugares.
	 * GET|HEAD /lugares/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$lugares = $this->lugaresRepository->apiFindOrFail($id);

		return $this->sendResponse($lugares->toArray(), "Lugares retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Lugares.
	 * GET|HEAD /lugares/{id}/edit
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
	 * Update the specified Lugares in storage.
	 * PUT/PATCH /lugares/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Lugares $lugares */
		$lugares = $this->lugaresRepository->apiFindOrFail($id);

		$result = $this->lugaresRepository->updateRich($input, $id);

		$lugares = $lugares->fresh();

		return $this->sendResponse($lugares->toArray(), "Lugares updated successfully");
	}

	/**
	 * Remove the specified Lugares from storage.
	 * DELETE /lugares/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->lugaresRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Lugares deleted successfully");
	}
}
