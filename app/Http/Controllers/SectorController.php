<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Libraries\Repositories\SectorRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Sector;
use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;

class SectorController extends AppBaseController
{

	/** @var  SectorRepository */
	private $sectorRepository;

	function __construct(SectorRepository $sectorRepo)
	{
		$this->sectorRepository = $sectorRepo;
	}

	/**
	 * Display a listing of the Sector.
	 *
	 * @return Response
	 */
	public function index()
	{

	  $sectores= DB::table('sectores')
		->join('ciudades','ciudades.id' ,'=','sectores.ciudad_id')
		->select('sectores.id','sectores.nombre', 'sectores.ciudad_id','ciudades.nombre as ciudad')
		->orderby('sectores.ciudad_id','desc')
		->get();
	  //dd($sectores);

		return view('sectores.index')
			->with('sectores', $sectores);
	}

	/**
	 * Show the form for creating a new Sector.
	 *
	 * @return Response
	 */
	public function create()
	{
		$ciudades = Ciudad::orderBy('id', 'asc')->lists('nombre', 'id');

		return view('sectores.create', compact('ciudades',$ciudades));
	}

	/**
	 * Store a newly created Sector in storage.
	 *
	 * @param CreateSectorRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSectorRequest $request)
	{
		$input = $request->all();

		$sector = $this->sectorRepository->create($input);

		Flash::success('Sector saved successfully.');

		return redirect(route('admin.sectores.index'));
	}

	/**
	 * Display the specified Sector.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$sector = $this->sectorRepository->find($id);

		if(empty($sector))
		{
			Flash::error('Sector not found');

			return redirect(route('admin.sectores.index'));
		}

		return view('sectores.show')->with('sector', $sector);
	}

	/**
	 * Show the form for editing the specified Sector.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
	  $sector = $this->sectorRepository->find($id);

	  $ciudades = Ciudad::orderBy('id', 'asc')->lists('nombre', 'id');


		if(empty($sector))
		{
			Flash::error('Sector not found');

			return redirect(route('admin.sectores.index'));
		}

		return view('sectores.edit')->with(array('sector' => $sector, 'ciudades' => $ciudades));
	}

	/**
	 * Update the specified Sector in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSectorRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSectorRequest $request)
	{
		$sector = $this->sectorRepository->find($id);

		if(empty($sector))
		{
			Flash::error('Sector not found');

			return redirect(route('admin.sectores.index'));
		}

		$this->sectorRepository->updateRich($request->all(), $id);

		Flash::success('Sector updated successfully.');

		return redirect(route('admin.sectores.index'));
	}

	/**
	 * Remove the specified Sector from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$sector = $this->sectorRepository->find($id);

		if(empty($sector))
		{
			Flash::error('Sector not found');

			return redirect(route('admin.sectores.index'));
		}

		$this->sectorRepository->delete($id);

		Flash::success('Sector deleted successfully.');

		return redirect(route('admin.sectores.index'));
	}

	public function listado($id)
	{

		$sectores = DB::table('sectores')->join('ciudades', 'ciudades.id', '=', 'sectores.ciudad_id')
			->where('sectores.ciudad_id', '=', $id)
			->select('sectores.id', 'sectores.nombre')
			->get();

			//dd($sectores);

		return ($sectores);
	}
}
