<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SectorRepository;
use App\Models\Sector;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SectorAPIController extends AppBaseController
{
	/** @var  SectorRepository */
	private $sectorRepository;

	function __construct(SectorRepository $sectorRepo)
	{
		$this->sectorRepository = $sectorRepo;
	}

	/**
	 * Display a listing of the Sector.
	 * GET|HEAD /sectors
	 *
	 * @return Response
	 */
	public function index()
	{
		$sectors = $this->sectorRepository->all();

		return $this->sendResponse($sectors->toArray(), "Sectors retrieved successfully");
	}

	/**
	 * Show the form for creating a new Sector.
	 * GET|HEAD /sectors/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Sector in storage.
	 * POST /sectors
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Sector::$rules) > 0)
			$this->validateRequestOrFail($request, Sector::$rules);

		$input = $request->all();

		$sectors = $this->sectorRepository->create($input);

		return $this->sendResponse($sectors->toArray(), "Sector saved successfully");
	}

	/**
	 * Display the specified Sector.
	 * GET|HEAD /sectors/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$sector = $this->sectorRepository->apiFindOrFail($id);

		return $this->sendResponse($sector->toArray(), "Sector retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Sector.
	 * GET|HEAD /sectors/{id}/edit
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
	 * Update the specified Sector in storage.
	 * PUT/PATCH /sectors/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Sector $sector */
		$sector = $this->sectorRepository->apiFindOrFail($id);

		$result = $this->sectorRepository->updateRich($input, $id);

		$sector = $sector->fresh();

		return $this->sendResponse($sector->toArray(), "Sector updated successfully");
	}

	/**
	 * Remove the specified Sector from storage.
	 * DELETE /sectors/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->sectorRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Sector deleted successfully");
	}
}
