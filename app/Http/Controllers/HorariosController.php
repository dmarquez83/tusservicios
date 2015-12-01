<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateHorariosRequest;
use App\Http\Requests\UpdateHorariosRequest;
use App\Libraries\Repositories\HorariosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class HorariosController extends AppBaseController
{

	/** @var  HorariosRepository */
	private $horariosRepository;

	function __construct(HorariosRepository $horariosRepo)
	{
		$this->horariosRepository = $horariosRepo;
	}

	/**
	 * Display a listing of the Horarios.
	 *
	 * @return Response
	 */
	public function index()
	{
		$horarios = $this->horariosRepository->paginate(10);

		return view('horarios.index')
			->with('horarios', $horarios);
	}

	/**
	 * Show the form for creating a new Horarios.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('horarios.create');
	}

	/**
	 * Store a newly created Horarios in storage.
	 *
	 * @param CreateHorariosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateHorariosRequest $request)
	{
		$input = $request->all();

		$horarios = $this->horariosRepository->create($input);

		Flash::success('Horarios saved successfully.');

		return redirect(route('horarios.index'));
	}

	/**
	 * Display the specified Horarios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$horarios = $this->horariosRepository->find($id);

		if(empty($horarios))
		{
			Flash::error('Horarios not found');

			return redirect(route('horarios.index'));
		}

		return view('horarios.show')->with('horarios', $horarios);
	}

	/**
	 * Show the form for editing the specified Horarios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$horarios = $this->horariosRepository->find($id);

		if(empty($horarios))
		{
			Flash::error('Horarios not found');

			return redirect(route('horarios.index'));
		}

		return view('horarios.edit')->with('horarios', $horarios);
	}

	/**
	 * Update the specified Horarios in storage.
	 *
	 * @param  int              $id
	 * @param UpdateHorariosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateHorariosRequest $request)
	{
		$horarios = $this->horariosRepository->find($id);

		if(empty($horarios))
		{
			Flash::error('Horarios not found');

			return redirect(route('horarios.index'));
		}

		$this->horariosRepository->updateRich($request->all(), $id);

		Flash::success('Horarios updated successfully.');

		return redirect(route('horarios.index'));
	}

	/**
	 * Remove the specified Horarios from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$horarios = $this->horariosRepository->find($id);

		if(empty($horarios))
		{
			Flash::error('Horarios not found');

			return redirect(route('horarios.index'));
		}

		$this->horariosRepository->delete($id);

		Flash::success('Horarios deleted successfully.');

		return redirect(route('horarios.index'));
	}
}
