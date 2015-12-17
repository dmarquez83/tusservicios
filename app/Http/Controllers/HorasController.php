<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateHorasRequest;
use App\Http\Requests\UpdateHorasRequest;
use App\Libraries\Repositories\HorasRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class HorasController extends AppBaseController
{

	/** @var  HorasRepository */
	private $horasRepository;

	function __construct(HorasRepository $horasRepo)
	{
		$this->horasRepository = $horasRepo;
	}

	/**
	 * Display a listing of the Horas.
	 *
	 * @return Response
	 */
	public function index()
	{
		$horas = $this->horasRepository->paginate(10);

		return view('horas.index')
			->with('horas', $horas);
	}

	/**
	 * Show the form for creating a new Horas.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('horas.create');
	}

	/**
	 * Store a newly created Horas in storage.
	 *
	 * @param CreateHorasRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateHorasRequest $request)
	{
		$input = $request->all();

		$horas = $this->horasRepository->create($input);

		Flash::success('Horas saved successfully.');

		return redirect(route('admin.horas.index'));
	}

	/**
	 * Display the specified Horas.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$horas = $this->horasRepository->find($id);

		if(empty($horas))
		{
			Flash::error('Horas not found');

			return redirect(route('admin.horas.index'));
		}

		return view('horas.show')->with('horas', $horas);
	}

	/**
	 * Show the form for editing the specified Horas.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$horas = $this->horasRepository->find($id);

		if(empty($horas))
		{
			Flash::error('Horas not found');

			return redirect(route('admin.horas.index'));
		}

		return view('horas.edit')->with('horas', $horas);
	}

	/**
	 * Update the specified Horas in storage.
	 *
	 * @param  int              $id
	 * @param UpdateHorasRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateHorasRequest $request)
	{
		$horas = $this->horasRepository->find($id);

		if(empty($horas))
		{
			Flash::error('Horas not found');

			return redirect(route('admin.horas.index'));
		}

		$this->horasRepository->updateRich($request->all(), $id);

		Flash::success('Horas updated successfully.');

		return redirect(route('admin.horas.index'));
	}

	/**
	 * Remove the specified Horas from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$horas = $this->horasRepository->find($id);

		if(empty($horas))
		{
			Flash::error('Horas not found');

			return redirect(route('admin.horas.index'));
		}

		$this->horasRepository->delete($id);

		Flash::success('Horas deleted successfully.');

		return redirect(route('admin.horas.index'));
	}
}
