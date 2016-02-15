<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCatalogosInsumosRequest;
use App\Http\Requests\UpdateCatalogosInsumosRequest;
use App\Libraries\Repositories\CatalogosInsumosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CatalogosInsumosController extends AppBaseController
{

	/** @var  CatalogosInsumosRepository */
	private $catalogosInsumosRepository;

	function __construct(CatalogosInsumosRepository $catalogosInsumosRepo)
	{
		$this->catalogosInsumosRepository = $catalogosInsumosRepo;
	}

	/**
	 * Display a listing of the CatalogosInsumos.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogosInsumos = $this->catalogosInsumosRepository->paginate(10);

		return view('modulos.catalogosInsumos.index')
			->with('catalogosInsumos', $catalogosInsumos);
	}

	/**
	 * Show the form for creating a new CatalogosInsumos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('modulos.catalogosInsumos.create');
	}

	/**
	 * Store a newly created CatalogosInsumos in storage.
	 *
	 * @param CreateCatalogosInsumosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCatalogosInsumosRequest $request)
	{
		$input = $request->all();

		$catalogosInsumos = $this->catalogosInsumosRepository->create($input);

		Flash::success('CatalogosInsumos saved successfully.');

		return redirect(route('catalogosInsumos.index'));
	}

	/**
	 * Display the specified CatalogosInsumos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$catalogosInsumos = $this->catalogosInsumosRepository->find($id);

		if(empty($catalogosInsumos))
		{
			Flash::error('CatalogosInsumos not found');

			return redirect(route('catalogosInsumos.index'));
		}

		return view('modulos.catalogosInsumos.show')->with('catalogosInsumos', $catalogosInsumos);
	}

	/**
	 * Show the form for editing the specified CatalogosInsumos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$catalogosInsumos = $this->catalogosInsumosRepository->find($id);

		if(empty($catalogosInsumos))
		{
			Flash::error('CatalogosInsumos not found');

			return redirect(route('catalogosInsumos.index'));
		}

		return view('modulos.catalogosInsumos.edit')->with('catalogosInsumos', $catalogosInsumos);
	}

	/**
	 * Update the specified CatalogosInsumos in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCatalogosInsumosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCatalogosInsumosRequest $request)
	{
		$catalogosInsumos = $this->catalogosInsumosRepository->find($id);

		if(empty($catalogosInsumos))
		{
			Flash::error('CatalogosInsumos not found');

			return redirect(route('catalogosInsumos.index'));
		}

		$this->catalogosInsumosRepository->updateRich($request->all(), $id);

		Flash::success('CatalogosInsumos updated successfully.');

		return redirect(route('catalogosInsumos.index'));
	}

	/**
	 * Remove the specified CatalogosInsumos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$catalogosInsumos = $this->catalogosInsumosRepository->find($id);

		if(empty($catalogosInsumos))
		{
			Flash::error('CatalogosInsumos not found');

			return redirect(route('catalogosInsumos.index'));
		}

		$this->catalogosInsumosRepository->delete($id);

		Flash::success('CatalogosInsumos deleted successfully.');

		return redirect(route('catalogosInsumos.index'));
	}
}
