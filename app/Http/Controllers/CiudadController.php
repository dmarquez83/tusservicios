<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCiudadRequest;
use App\Http\Requests\UpdateCiudadRequest;
use App\Libraries\Repositories\CiudadRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CiudadController extends AppBaseController
{

	/** @var  CiudadRepository */
	private $ciudadRepository;

	function __construct(CiudadRepository $ciudadRepo)
	{
		$this->ciudadRepository = $ciudadRepo;
	}

	/**
	 * Display a listing of the Ciudad.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ciudades = $this->ciudadRepository->paginate(10);

		//dd($ciudades);

		return view('ciudades.index')
			->with('ciudades', $ciudades);
	}

	/**
	 * Show the form for creating a new Ciudad.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ciudades.create');
	}

	/**
	 * Store a newly created Ciudad in storage.
	 *
	 * @param CreateCiudadRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCiudadRequest $request)
	{
		$input = $request->all();

		$ciudad = $this->ciudadRepository->create($input);

		Flash::success('Ciudad saved successfully.');

		return redirect(route('admin.ciudades.index'));
	}

	/**
	 * Display the specified Ciudad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ciudad = $this->ciudadRepository->find($id);

		if(empty($ciudad))
		{
			Flash::error('Ciudad not found');

			return redirect(route('admin.ciudades.index'));
		}

		return view('ciudades.show')->with('ciudad', $ciudad);
	}

	/**
	 * Show the form for editing the specified Ciudad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$ciudad = $this->ciudadRepository->find($id);

		if(empty($ciudad))
		{
			Flash::error('Ciudad not found');

			return redirect(route('admin.ciudades.index'));
		}

		return view('ciudades.edit')->with('ciudad', $ciudad);
	}

	/**
	 * Update the specified Ciudad in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCiudadRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCiudadRequest $request)
	{
		$ciudad = $this->ciudadRepository->find($id);

		if(empty($ciudad))
		{
			Flash::error('Ciudad not found');

			return redirect(route('admin.ciudades.index'));
		}

		$this->ciudadRepository->updateRich($request->all(), $id);

		Flash::success('Ciudad updated successfully.');

		return redirect(route('admin.ciudades.index'));
	}

	/**
	 * Remove the specified Ciudad from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ciudad = $this->ciudadRepository->find($id);

		if(empty($ciudad))
		{
			Flash::error('Ciudad not found');

			return redirect(route('admin.ciudades.index'));
		}

		$this->ciudadRepository->delete($id);

		Flash::success('Ciudad deleted successfully.');

		return redirect(route('admin.ciudades.index'));
	}
}
