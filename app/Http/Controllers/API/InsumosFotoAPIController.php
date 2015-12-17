<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\InsumosFotoRepository;
use App\Models\InsumosFoto;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class InsumosFotoAPIController extends AppBaseController
{
	/** @var  InsumosFotoRepository */
	private $insumosFotoRepository;

	function __construct(InsumosFotoRepository $insumosFotoRepo)
	{
		$this->insumosFotoRepository = $insumosFotoRepo;
	}

	/**
	 * Display a listing of the InsumosFoto.
	 * GET|HEAD /insumosFotos
	 *
	 * @return Response
	 */
	public function index()
	{
		$insumosFotos = $this->insumosFotoRepository->all();

		return $this->sendResponse($insumosFotos->toArray(), "InsumosFotos retrieved successfully");
	}

	/**
	 * Show the form for creating a new InsumosFoto.
	 * GET|HEAD /insumosFotos/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created InsumosFoto in storage.
	 * POST /insumosFotos
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(InsumosFoto::$rules) > 0)
			$this->validateRequestOrFail($request, InsumosFoto::$rules);

		$input = $request->all();

		$insumosFotos = $this->insumosFotoRepository->create($input);

		return $this->sendResponse($insumosFotos->toArray(), "InsumosFoto saved successfully");
	}

	/**
	 * Display the specified InsumosFoto.
	 * GET|HEAD /insumosFotos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$insumosFoto = $this->insumosFotoRepository->apiFindOrFail($id);

		return $this->sendResponse($insumosFoto->toArray(), "InsumosFoto retrieved successfully");
	}

	/**
	 * Show the form for editing the specified InsumosFoto.
	 * GET|HEAD /insumosFotos/{id}/edit
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
	 * Update the specified InsumosFoto in storage.
	 * PUT/PATCH /insumosFotos/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var InsumosFoto $insumosFoto */
		$insumosFoto = $this->insumosFotoRepository->apiFindOrFail($id);

		$result = $this->insumosFotoRepository->updateRich($input, $id);

		$insumosFoto = $insumosFoto->fresh();

		return $this->sendResponse($insumosFoto->toArray(), "InsumosFoto updated successfully");
	}

	/**
	 * Remove the specified InsumosFoto from storage.
	 * DELETE /insumosFotos/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->insumosFotoRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "InsumosFoto deleted successfully");
	}
}
