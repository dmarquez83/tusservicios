<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCatalogosRequest;
use App\Http\Requests\UpdateCatalogosRequest;
use App\Libraries\Repositories\CatalogosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Solicitudes;
use App\Models\InsumosSolicitudes;
use Illuminate\Support\Collection as Collection;

class CatalogosController extends AppBaseController
{

	/** @var  CatalogosRepository */
	private $catalogosRepository;

	function __construct(CatalogosRepository $catalogosRepo)
	{
		$this->catalogosRepository = $catalogosRepo;
	}

	/**
	 * Display a listing of the Catalogos.
	 *
	 * @return Response
	 */
	public function index()
	{
		$catalogos = $this->catalogosRepository->paginate(10);

		return view('catalogos.index')
			->with('catalogos', $catalogos);
	}

	/**
	 * Show the form for creating a new Catalogos.
	 *
	 * @return Response
	 */
	public function createnew($id)
	{

	  $solicitudes = Solicitudes::join('servicios','servicios.id','=','solicitudes.id_servicio')
		->where('solicitudes.id','=',$id)
		->select('solicitudes.descripcion','solicitudes.fecha','solicitudes.hora','solicitudes.direccion','solicitudes.telefono','solicitudes.horas as contacto','servicios.nombre','servicios.descripcion as descripcion_servicio')
		->orderBy('solicitudes.id', 'DESC')->get();

	  //$insumos = InsumosSolicitudes::where('solicitud_id',$id)->orderBy('id', 'DESC')->get();

	  $insumos = InsumosSolicitudes::join('insumos','insumos.id','=','insumos_solicitudes.insumo_id')
	    ->where('solicitud_id',$id)
		->select('insumos.descripcion','insumos.referencia','insumos.foto', 'insumos.id')
		->orderBy('id', 'DESC')->get();

	  $insumos = Collection::make($insumos);

	 // dd($insumos);

		return view('catalogos.tablecatalogo', compact('solicitudes',$solicitudes, 'insumos', $insumos));
	}

	/**
	 * Store a newly created Catalogos in storage.
	 *
	 * @param CreateCatalogosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCatalogosRequest $request)
	{
		$input = $request->all();

		$catalogos = $this->catalogosRepository->create($input);

		Flash::success('Catalogos saved successfully.');

		return redirect(route('catalogos.index'));
	}

	/**
	 * Display the specified Catalogos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		return view('catalogos.show')->with('catalogos', $catalogos);
	}

	/**
	 * Show the form for editing the specified Catalogos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		return view('catalogos.edit')->with('catalogos', $catalogos);
	}

	/**
	 * Update the specified Catalogos in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCatalogosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCatalogosRequest $request)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		$this->catalogosRepository->updateRich($request->all(), $id);

		Flash::success('Catalogos updated successfully.');

		return redirect(route('catalogos.index'));
	}

	/**
	 * Remove the specified Catalogos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$catalogos = $this->catalogosRepository->find($id);

		if(empty($catalogos))
		{
			Flash::error('Catalogos not found');

			return redirect(route('catalogos.index'));
		}

		$this->catalogosRepository->delete($id);

		Flash::success('Catalogos deleted successfully.');

		return redirect(route('catalogos.index'));
	}
}
