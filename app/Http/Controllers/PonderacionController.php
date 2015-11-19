<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePonderacionRequest;
use App\Http\Requests\UpdatePonderacionRequest;
use App\Libraries\Repositories\PonderacionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PonderacionController extends AppBaseController
{

	/** @var  PonderacionRepository */
	private $ponderacionRepository;

	function __construct(PonderacionRepository $ponderacionRepo)
	{
		$this->ponderacionRepository = $ponderacionRepo;
	}

	/**
	 * Display a listing of the Ponderacion.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ponderaciones = $this->ponderacionRepository->paginate(10);
        //dd($ponderaciones);
		return view('ponderaciones.index')
			->with('ponderaciones', $ponderaciones);
	}

	/**
	 * Show the form for creating a new Ponderacion.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ponderaciones.create');
	}

	/**
	 * Store a newly created Ponderacion in storage.
	 *
	 * @param CreatePonderacionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePonderacionRequest $request)
	{
	  $this->validate($request, [
		'valor' => 'required|unique:ponderaciones|max:100',
		'nombre' => 'required|max:255',

	  ]);

		$input = $request->all();

		$this->ponderacionRepository->create($input);

		Flash::success('Ponderacion guardada correctamente.');

		return redirect(route('ponderaciones.index'));
	}

	/**
	 * Display the specified Ponderacion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion no funciona');

			return redirect(route('ponderaciones.index'));
		}

		return view('ponderaciones.show')->with('ponderacion', $ponderacion);
	}

	/**
	 * Show the form for editing the specified Ponderacion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion no funciona');

			return redirect(route('ponderaciones.index'));
		}

		return view('ponderaciones.edit')->with('ponderacion', $ponderacion);
	}

	/**
	 * Update the specified Ponderacion in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePonderacionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePonderacionRequest $request)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion no funciona');

			return redirect(route('ponderaciones.index'));
		}

		$ponderacion = $this->ponderacionRepository->updateRich($request->all(), $id);

		Flash::success('Ponderacion modificada correctamente.');

		return redirect(route('ponderaciones.index'));
	}

	/**
	 * Remove the specified Ponderacion from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$ponderacion = $this->ponderacionRepository->find($id);

		if(empty($ponderacion))
		{
			Flash::error('Ponderacion no funciona');

			return redirect(route('ponderaciones.index'));
		}

		$this->ponderacionRepository->delete($id);

		Flash::success('Ponderacion deleted successfully.');

		return redirect(route('ponderaciones.index'));
	}
}
