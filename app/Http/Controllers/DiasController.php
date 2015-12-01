<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDiasRequest;
use App\Http\Requests\UpdateDiasRequest;
use App\Libraries\Repositories\DiasRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class DiasController extends AppBaseController
{

	/** @var  DiasRepository */
	private $diasRepository;

	function __construct(DiasRepository $diasRepo)
	{
		$this->diasRepository = $diasRepo;
	}

	/**
	 * Display a listing of the Dias.
	 *
	 * @return Response
	 */
	public function index()
	{
		$dias = $this->diasRepository->paginate(10);

		return view('dias.index')
			->with('dias', $dias);
	}

	/**
	 * Show the form for creating a new Dias.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('dias.create');
	}

	/**
	 * Store a newly created Dias in storage.
	 *
	 * @param CreateDiasRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDiasRequest $request)
	{
		$input = $request->all();

		$dias = $this->diasRepository->create($input);

		Flash::success('Dias saved successfully.');

		return redirect(route('dias.index'));
	}

	/**
	 * Display the specified Dias.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$dias = $this->diasRepository->find($id);

		if(empty($dias))
		{
			Flash::error('Dias not found');

			return redirect(route('dias.index'));
		}

		return view('dias.show')->with('dias', $dias);
	}

	/**
	 * Show the form for editing the specified Dias.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$dias = $this->diasRepository->find($id);

		if(empty($dias))
		{
			Flash::error('Dias not found');

			return redirect(route('dias.index'));
		}

		return view('dias.edit')->with('dias', $dias);
	}

	/**
	 * Update the specified Dias in storage.
	 *
	 * @param  int              $id
	 * @param UpdateDiasRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateDiasRequest $request)
	{
		$dias = $this->diasRepository->find($id);

		if(empty($dias))
		{
			Flash::error('Dias not found');

			return redirect(route('dias.index'));
		}

		$this->diasRepository->updateRich($request->all(), $id);

		Flash::success('Dias updated successfully.');

		return redirect(route('dias.index'));
	}

	/**
	 * Remove the specified Dias from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$dias = $this->diasRepository->find($id);

		if(empty($dias))
		{
			Flash::error('Dias not found');

			return redirect(route('dias.index'));
		}

		$this->diasRepository->delete($id);

		Flash::success('Dias deleted successfully.');

		return redirect(route('dias.index'));
	}
}
