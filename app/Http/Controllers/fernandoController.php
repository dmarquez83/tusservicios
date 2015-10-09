<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatefernandoRequest;
use App\Http\Requests\UpdatefernandoRequest;
use App\Libraries\Repositories\fernandoRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class fernandoController extends AppBaseController
{

	/** @var  fernandoRepository */
	private $fernandoRepository;

	function __construct(fernandoRepository $fernandoRepo)
	{
		$this->fernandoRepository = $fernandoRepo;
	}

	/**
	 * Display a listing of the fernando.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fernandos = $this->fernandoRepository->paginate(10);

		return view('fernandos.index')
			->with('fernandos', $fernandos);
	}

	/**
	 * Show the form for creating a new fernando.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('fernandos.create');
	}

	/**
	 * Store a newly created fernando in storage.
	 *
	 * @param CreatefernandoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatefernandoRequest $request)
	{
		$input = $request->all();

		$fernando = $this->fernandoRepository->create($input);

		Flash::success('fernando saved successfully.');

		return redirect(route('fernandos.index'));
	}

	/**
	 * Display the specified fernando.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fernando = $this->fernandoRepository->find($id);

		if(empty($fernando))
		{
			Flash::error('fernando not found');

			return redirect(route('fernandos.index'));
		}

		return view('fernandos.show')->with('fernando', $fernando);
	}

	/**
	 * Show the form for editing the specified fernando.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$fernando = $this->fernandoRepository->find($id);

		if(empty($fernando))
		{
			Flash::error('fernando not found');

			return redirect(route('fernandos.index'));
		}

		return view('fernandos.edit')->with('fernando', $fernando);
	}

	/**
	 * Update the specified fernando in storage.
	 *
	 * @param  int              $id
	 * @param UpdatefernandoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatefernandoRequest $request)
	{
		$fernando = $this->fernandoRepository->find($id);

		if(empty($fernando))
		{
			Flash::error('fernando not found');

			return redirect(route('fernandos.index'));
		}

		$fernando = $this->fernandoRepository->updateRich($request->all(), $id);

		Flash::success('fernando updated successfully.');

		return redirect(route('fernandos.index'));
	}

	/**
	 * Remove the specified fernando from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$fernando = $this->fernandoRepository->find($id);

		if(empty($fernando))
		{
			Flash::error('fernando not found');

			return redirect(route('fernandos.index'));
		}

		$this->fernandoRepository->delete($id);

		Flash::success('fernando deleted successfully.');

		return redirect(route('fernandos.index'));
	}
}
