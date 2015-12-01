<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCatalogosRequest;
use App\Http\Requests\UpdateCatalogosRequest;
use App\Libraries\Repositories\CatalogosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CatalogosController extends AppBaseController
{

	/** @var  CatalogosRepository */
	private $catalogosRepository;

	function __construct(CatalogosRepository $catalogosRepo)
	{
		$this->catalogosRepository = $catalogosRepo;
	}

	/**
	 * Display a listing of the Catalogos.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogos = $this->catalogosRepository->paginate(10);

		return view('catalogos.index')
			->with('catalogos', $catalogos);
	}

	/**
	 * Show the form for creating a new Catalogos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('catalogos.create');
	}

	/**
	 * Store a newly created Catalogos in storage.
	 *
	 * @param CreateCatalogosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCatalogosRequest $request)
	{
		$input = $request->all();

		$catalogos = $this->catalogosRepository->create($input);

		Flash::success('Catalogos saved successfully.');

		return redirect(route('catalogos.index'));
	}

	/**
	 * Display the specified Catalogos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		return view('catalogos.show')->with('catalogos', $catalogos);
	}

	/**
	 * Show the form for editing the specified Catalogos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		return view('catalogos.edit')->with('catalogos', $catalogos);
	}

	/**
	 * Update the specified Catalogos in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCatalogosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCatalogosRequest $request)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		$this->catalogosRepository->updateRich($request->all(), $id);

		Flash::success('Catalogos updated successfully.');

		return redirect(route('catalogos.index'));
	}

	/**
	 * Remove the specified Catalogos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		$this->catalogosRepository->delete($id);

		Flash::success('Catalogos deleted successfully.');

		return redirect(route('catalogos.index'));
	}
}
