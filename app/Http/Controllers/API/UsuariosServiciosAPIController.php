<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\UsuariosServiciosRepository;
use App\Models\UsuariosServicios;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class UsuariosServiciosAPIController extends AppBaseController
{
	/** @var  UsuariosServiciosRepository */
	private $usuariosServiciosRepository;

	function __construct(UsuariosServiciosRepository $usuariosServiciosRepo)
	{
		$this->usuariosServiciosRepository = $usuariosServiciosRepo;
	}

	/**
	 * Display a listing of the UsuariosServicios.
	 * GET|HEAD /usuariosServicios
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuariosServicios = $this->usuariosServiciosRepository->all();

		return $this->sendResponse($usuariosServicios->toArray(), "UsuariosServicios retrieved successfully");
	}

	/**
	 * Show the form for creating a new UsuariosServicios.
	 * GET|HEAD /usuariosServicios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created UsuariosServicios in storage.
	 * POST /usuariosServicios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(UsuariosServicios::$rules) > 0)
			$this->validateRequestOrFail($request, UsuariosServicios::$rules);

		$input = $request->all();

		$usuariosServicios = $this->usuariosServiciosRepository->create($input);

		return $this->sendResponse($usuariosServicios->toArray(), "UsuariosServicios saved successfully");
	}

	/**
	 * Display the specified UsuariosServicios.
	 * GET|HEAD /usuariosServicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->apiFindOrFail($id);

		return $this->sendResponse($usuariosServicios->toArray(), "UsuariosServicios retrieved successfully");
	}

	/**
	 * Show the form for editing the specified UsuariosServicios.
	 * GET|HEAD /usuariosServicios/{id}/edit
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
	 * Update the specified UsuariosServicios in storage.
	 * PUT/PATCH /usuariosServicios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var UsuariosServicios $usuariosServicios */
		$usuariosServicios = $this->usuariosServiciosRepository->apiFindOrFail($id);

		$result = $this->usuariosServiciosRepository->updateRich($input, $id);

		$usuariosServicios = $usuariosServicios->fresh();

		return $this->sendResponse($usuariosServicios->toArray(), "UsuariosServicios updated successfully");
	}

	/**
	 * Remove the specified UsuariosServicios from storage.
	 * DELETE /usuariosServicios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->usuariosServiciosRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "UsuariosServicios deleted successfully");
	}
}
