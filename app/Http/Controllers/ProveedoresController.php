<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProveedoresRequest;
use App\Http\Requests\UpdateProveedoresRequest;
use App\Libraries\Repositories\ProveedoresRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ProveedoresController extends AppBaseController
{

	/** @var  ProveedoresRepository */
	private $proveedoresRepository;

	function __construct(ProveedoresRepository $proveedoresRepo)
	{
		$this->proveedoresRepository = $proveedoresRepo;
	}

	/**
	 * Display a listing of the Proveedores.
	 *
	 * @return Response
	 */
	public function index()
	{
		$proveedores = $this->proveedoresRepository->paginate(10);

		return view('proveedores.index')
			->with('proveedores', $proveedores);
	}

	/**
	 * Show the form for creating a new Proveedores.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('proveedores.create');
	}

	/**
	 * Store a newly created Proveedores in storage.
	 *
	 * @param CreateProveedoresRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProveedoresRequest $request)
	{
		$input = $request->all();

		$proveedores = $this->proveedoresRepository->create($input);

		Flash::success('Proveedores guardado correctamente.');

		return redirect(route('admin.proveedores.index'));
	}

	/**
	 * Display the specified Proveedores.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores  no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		return view('proveedores.show')->with('proveedores', $proveedores);
	}

	/**
	 * Show the form for editing the specified Proveedores.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores  no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		return view('proveedores.edit')->with('proveedores', $proveedores);
	}

	/**
	 * Update the specified Proveedores in storage.
	 *
	 * @param  int              $id
	 * @param UpdateProveedoresRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateProveedoresRequest $request)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores  no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		$this->proveedoresRepository->updateRich($request->all(), $id);

		Flash::success('Proveedores actualizados correctamente.');

		return redirect(route('admin.proveedores.index'));
	}

	/**
	 * Remove the specified Proveedores from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$proveedores = $this->proveedoresRepository->find($id);

		if(empty($proveedores))
		{
			Flash::error('Proveedores no funciona');

			return redirect(route('admin.proveedores.index'));
		}

		$this->proveedoresRepository->delete($id);

		Flash::success('Proveedores borrados correctamente.');

		return redirect(route('admin.proveedores.index'));
	}
}
