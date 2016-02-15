<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTipousuariosRequest;
use App\Http\Requests\UpdateTipousuariosRequest;
use App\Libraries\Repositories\TipousuariosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class TipousuariosController extends AppBaseController
{

	/** @var  TipousuariosRepository */
	private $tipousuariosRepository;

	function __construct(TipousuariosRepository $tipousuariosRepo)
	{
		$this->tipousuariosRepository = $tipousuariosRepo;
	}

	/**
	 * Display a listing of the Tipousuarios.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipousuarios = $this->tipousuariosRepository->paginate(10);

		return view('modulos.tipousuarios.index')
			->with('tipousuarios', $tipousuarios);
	}

	/**
	 * Show the form for creating a new Tipousuarios.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('modulos.tipousuarios.create');
	}

	/**
	 * Store a newly created Tipousuarios in storage.
	 *
	 * @param CreateTipousuariosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTipousuariosRequest $request)
	{
		$input = $request->all();

		$tipousuarios = $this->tipousuariosRepository->create($input);

		Flash::success('Tipousuarios saved successfully.');

		return redirect(route('admin.tipousuarios.index'));
	}

	/**
	 * Display the specified Tipousuarios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tipousuarios = $this->tipousuariosRepository->find($id);

		if(empty($tipousuarios))
		{
			Flash::error('Tipousuarios not found');

			return redirect(route('admin.tipousuarios.index'));
		}

		return view('modulos.tipousuarios.show')->with('tipousuarios', $tipousuarios);
	}

	/**
	 * Show the form for editing the specified Tipousuarios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$tipousuarios = $this->tipousuariosRepository->find($id);

		if(empty($tipousuarios))
		{
			Flash::error('Tipousuarios not found');

			return redirect(route('admin.tipousuarios.index'));
		}

		return view('modulos.tipousuarios.edit')->with('tipousuarios', $tipousuarios);
	}

	/**
	 * Update the specified Tipousuarios in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTipousuariosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTipousuariosRequest $request)
	{
		$tipousuarios = $this->tipousuariosRepository->find($id);

		if(empty($tipousuarios))
		{
			Flash::error('Tipousuarios not found');

			return redirect(route('admin.tipousuarios.index'));
		}

		$tipousuarios = $this->tipousuariosRepository->updateRich($request->all(), $id);

		Flash::success('Tipousuarios updated successfully.');

		return redirect(route('admin.tipousuarios.index'));
	}

	/**
	 * Remove the specified Tipousuarios from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tipousuarios = $this->tipousuariosRepository->find($id);

		if(empty($tipousuarios))
		{
			Flash::error('Tipousuarios not found');

			return redirect(route('admin.tipousuarios.index'));
		}

		$this->tipousuariosRepository->delete($id);

		Flash::success('Tipousuarios deleted successfully.');

		return redirect(route('admin.tipousuarios.index'));
	}
}
