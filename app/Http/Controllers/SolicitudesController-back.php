<?php namespace App\Http\Controllers;

use Mail;
use App\Http\Requests;
use App\Http\Requests\CreateSolicitudesRequest;
use App\Http\Requests\UpdateSolicitudesRequest;
use App\Libraries\Repositories\SolicitudesRepository;
use App\Models\Servicios;
use App\User;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SolicitudesController extends AppBaseController
{

	/** @var  SolicitudesRepository */
	private $solicitudesRepository;

	function __construct(SolicitudesRepository $solicitudesRepo)
	{
		$this->solicitudesRepository = $solicitudesRepo;
	}

	/**
	 * Display a listing of the Solicitudes.
	 *
	 * @return Response
	 */
	public function index()
	{
		$solicitudes = $this->solicitudesRepository->paginate(10);

		return view('solicitudes.index')
			->with('solicitudes', $solicitudes);
	}

	/**
	 * Show the form for creating a new Solicitudes.
	 *
	 * @return Response
	 */
	public function create()
	{
	    /*ojo aqui debe venir ya el id del usuario que lo esta registrando preguntar si alguien sin registrarse puedde hacer una solicitud*/

		/*ojo aqui debe venir la categoria para seleccionar el tipo de servicio*/

		$servicios = Servicios::where('id', '1')->orderBy('id', 'asc')->lists('nombre', 'id');


		return view('solicitudes.create')->with('servicios', $servicios);

	}

	/**
	 * Store a newly created Solicitudes in storage.
	 *
	 * @param CreateSolicitudesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSolicitudesRequest $request)
	{
		$input = $request->all();

		$solicitudes = $this->solicitudesRepository->create($input);

		Flash::success('Solicitudes saved successfully.');

	/*	$id=7;

		$user = User::findOrFail($id);

		Mail::send('emails.solicitud', ['user' => $user], function ($m) use ($user) {
			$m->to($user->email, $user->name)->subject('Tu Solicitud a sido registrada');
		});*/



		return redirect(route('solicitudes.index'));
	}

	/**
	 * Display the specified Solicitudes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$solicitudes = $this->solicitudesRepository->find($id);

		if(empty($solicitudes))
		{
			Flash::error('Solicitudes not found');

			return redirect(route('solicitudes.index'));
		}

		return view('solicitudes.show')->with('solicitudes', $solicitudes);
	}

	/**
	 * Show the form for editing the specified Solicitudes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$solicitudes = $this->solicitudesRepository->find($id);

		if(empty($solicitudes))
		{
			Flash::error('Solicitudes not found');

			return redirect(route('solicitudes.index'));
		}

		return view('solicitudes.edit')->with('solicitudes', $solicitudes);
	}

	/**
	 * Update the specified Solicitudes in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSolicitudesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSolicitudesRequest $request)
	{
		$solicitudes = $this->solicitudesRepository->find($id);

		if(empty($solicitudes))
		{
			Flash::error('Solicitudes not found');

			return redirect(route('solicitudes.index'));
		}

		$solicitudes = $this->solicitudesRepository->updateRich($request->all(), $id);

		Flash::success('Solicitudes updated successfully.');

		return redirect(route('solicitudes.index'));
	}

	/**
	 * Remove the specified Solicitudes from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$solicitudes = $this->solicitudesRepository->find($id);

		if(empty($solicitudes))
		{
			Flash::error('Solicitudes not found');

			return redirect(route('solicitudes.index'));
		}

		$this->solicitudesRepository->delete($id);

		Flash::success('Solicitudes deleted successfully.');

		return redirect(route('solicitudes.index'));
	}
}
