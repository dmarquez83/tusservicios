<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PruebaRepository;
use App\Models\Prueba;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PruebaAPIController extends AppBaseController
{
	/** @var  PruebaRepository */
	private $pruebaRepository;

	function __construct(PruebaRepository $pruebaRepo)
	{
		$this->pruebaRepository = $pruebaRepo;
	}

	/**
	 * Display a listing of the Prueba.
	 * GET|HEAD /pruebas
	 *
	 * @return Response
	 */
	public function index()
	{
		$pruebas = $this->pruebaRepository->all();

		return $this->sendResponse($pruebas->toArray(), "Pruebas retrieved successfully");
	}

	/**
	 * Show the form for creating a new Prueba.
	 * GET|HEAD /pruebas/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Prueba in storage.
	 * POST /pruebas
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Prueba::$rules) > 0)
			$this->validateRequestOrFail($request, Prueba::$rules);

		$input = $request->all();

		$pruebas = $this->pruebaRepository->create($input);

		return $this->sendResponse($pruebas->toArray(), "Prueba saved successfully");
	}

	/**
	 * Display the specified Prueba.
	 * GET|HEAD /pruebas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$prueba = $this->pruebaRepository->apiFindOrFail($id);

		return $this->sendResponse($prueba->toArray(), "Prueba retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Prueba.
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
	 * Update the specified Prueba in storage.
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

		/** @var Prueba $prueba */
		$prueba = $this->pruebaRepository->apiFindOrFail($id);

		$result = $this->pruebaRepository->updateRich($input, $id);

		$prueba = $prueba->fresh();

		return $this->sendResponse($prueba->toArray(), "Prueba updated successfully");
	}

	/**
	 * Remove the specified Prueba from storage.
	 * DELETE /pruebas/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->pruebaRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Prueba deleted successfully");
	}
}
