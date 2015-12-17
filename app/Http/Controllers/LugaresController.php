<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLugaresRequest;
use App\Http\Requests\UpdateLugaresRequest;
use App\Libraries\Repositories\LugaresRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class LugaresController extends AppBaseController
{

	/** @var  LugaresRepository */
	private $lugaresRepository;

	function __construct(LugaresRepository $lugaresRepo)
	{
		$this->lugaresRepository = $lugaresRepo;
	}

	/**
	 * Display a listing of the Lugares.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lugares = $this->lugaresRepository->paginate(10);

		return view('lugares.index')
			->with('lugares', $lugares);
	}

	/**
	 * Show the form for creating a new Lugares.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lugares.create');
	}

	/**
	 * Store a newly created Lugares in storage.
	 *
	 * @param CreateLugaresRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateLugaresRequest $request)
	{
		$input = $request->all();

		$lugares = $this->lugaresRepository->create($input);

		Flash::success('Lugares saved successfully.');

		return redirect(route('lugares.index'));
	}

	/**
	 * Display the specified Lugares.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$lugares = $this->lugaresRepository->find($id);

		if(empty($lugares))
		{
			Flash::error('Lugares not found');

			return redirect(route('lugares.index'));
		}

		return view('lugares.show')->with('lugares', $lugares);
	}

	/**
	 * Show the form for editing the specified Lugares.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$lugares = $this->lugaresRepository->find($id);

		if(empty($lugares))
		{
			Flash::error('Lugares not found');

			return redirect(route('lugares.index'));
		}

		return view('lugares.edit')->with('lugares', $lugares);
	}

	/**
	 * Update the specified Lugares in storage.
	 *
	 * @param  int              $id
	 * @param UpdateLugaresRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateLugaresRequest $request)
	{
		$lugares = $this->lugaresRepository->find($id);

		if(empty($lugares))
		{
			Flash::error('Lugares not found');

			return redirect(route('lugares.index'));
		}

		$this->lugaresRepository->updateRich($request->all(), $id);

		Flash::success('Lugares updated successfully.');

		return redirect(route('lugares.index'));
	}

	/**
	 * Remove the specified Lugares from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$lugares = $this->lugaresRepository->find($id);

		if(empty($lugares))
		{
			Flash::error('Lugares not found');

			return redirect(route('lugares.index'));
		}

		$this->lugaresRepository->delete($id);

		Flash::success('Lugares deleted successfully.');

		return redirect(route('lugares.index'));
	}
}
