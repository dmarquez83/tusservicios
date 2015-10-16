<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\pruebaRepository;
use App\Models\prueba;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class pruebaAPIController extends AppBaseController
{
	/** @var  pruebaRepository */
	private $pruebaRepository;

	function __construct(pruebaRepository $pruebaRepo)
	{
		$this->pruebaRepository = $pruebaRepo;
	}

	/**
	 * Display a listing of the prueba.
	 * GET|HEAD /pruebas
	 *
	 * @return Response
	 */
	public function index()
	{
		$pruebas = $this->pruebaRepository->all();

		return $this->sendResponse($pruebas->toArray(), "pruebas retrieved successfully");
	}

	/**
	 * Show the form for creating a new prueba.
	 * GET|HEAD /pruebas/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created prueba in storage.
	 * POST /pruebas
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(prueba::$rules) > 0)
			$this->validateRequestOrFail($request, prueba::$rules);

		$input = $request->all();

		$pruebas = $this->pruebaRepository->create($input);

		return $this->sendResponse($pruebas->toArray(), "prueba saved successfully");
	}

	/**
	 * Display the specified prueba.
	 * GET|HEAD /pruebas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$prueba = $this->pruebaRepository->apiFindOrFail($id);

		return $this->sendResponse($prueba->toArray(), "prueba retrieved successfully");
	}

	/**
	 * Show the form for editing the specified prueba.
	 * GET|HEAD /pruebas/{id}/edit
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
	 * Update the specified prueba in storage.
	 * PUT/PATCH /pruebas/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var prueba $prueba */
		$prueba = $this->pruebaRepository->apiFindOrFail($id);

		$result = $this->pruebaRepository->updateRich($input, $id);

		$prueba = $prueba->fresh();

		return $this->sendResponse($prueba->toArray(), "prueba updated successfully");
	}

	/**
	 * Remove the specified prueba from storage.
	 * DELETE /pruebas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->pruebaRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "prueba deleted successfully");
	}
}
