<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CategoriaRepository;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CategoriaAPIController extends AppBaseController
{
	/** @var  CategoriaRepository */
	private $categoriaRepository;

	function __construct(CategoriaRepository $categoriaRepo)
	{
		$this->categoriaRepository = $categoriaRepo;
	}

	/**
	 * Display a listing of the Categoria.
	 * GET|HEAD /categorias
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = $this->categoriaRepository->all();

		return $this->sendResponse($categorias->toArray(), "Categorias retrieved successfully");
	}

	/**
	 * Show the form for creating a new Categoria.
	 * GET|HEAD /categorias/create
	 *
	 * @return Response
	 */
	public function create(array $data)
	{
		return Categoria::create([
			'nombre' => $data['nombre'],
			'descripcion' => $data['descripcion'],
		]);
	}

	/**
	 * Store a newly created Categoria in storage.
	 * POST /categorias
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Categoria::$rules) > 0)
			$this->validateRequestOrFail($request, Categoria::$rules);

		$input = $request->all();

		$categorias = $this->categoriaRepository->create($input);

		return $this->sendResponse($categorias->toArray(), "Categoria saved successfully");
	}

	/**
	 * Display the specified Categoria.
	 * GET|HEAD /categorias/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = $this->categoriaRepository->apiFindOrFail($id);

		return $this->sendResponse($categoria->toArray(), "Categoria retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Categoria.
	 * GET|HEAD /categorias/{id}/edit
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
	 * Update the specified Categoria in storage.
	 * PUT/PATCH /categorias/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Categoria $categoria */
		$categoria = $this->categoriaRepository->apiFindOrFail($id);

		$result = $this->categoriaRepository->updateRich($input, $id);

		$categoria = $categoria->fresh();

		return $this->sendResponse($categoria->toArray(), "Categoria updated successfully");
	}

	/**
	 * Remove the specified Categoria from storage.
	 * DELETE /categorias/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->categoriaRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Categoria deleted successfully");
	}
}
