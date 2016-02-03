<?php namespace App\Http\Controllers;

use App\Models\CatalogosInsumos;
use Illuminate\Http\Request;

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

use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\File;


use App\Models\ProveedoresInsumos;
use App\User;
use Mail;

use Illuminate\Support\Facades\DB;



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
		->select('solicitudes.id','solicitudes.descripcion','solicitudes.fecha','solicitudes.hora','solicitudes.direccion','solicitudes.telefono','solicitudes.horas as contacto','servicios.nombre','servicios.descripcion as descripcion_servicio')
		->orderBy('solicitudes.id', 'DESC')->get();

	  //$insumos = InsumosSolicitudes::where('solicitud_id',$id)->orderBy('id', 'DESC')->get();

	  $insumos = InsumosSolicitudes::join('insumos','insumos.id','=','insumos_solicitudes.insumo_id')
	    ->where('solicitud_id',$id)
		->select('insumos.descripcion','insumos.nombre','insumos.referencia','insumos.foto', 'insumos.id')
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

	  //dd($request);

	  $insumos = InsumosSolicitudes::where('solicitud_id',$request->get('solicitud_id'))->orderBy('id', 'DESC')->get();

	  //dd($insumos);

	  $catalogoId = \DB::table('catalogos')->insertGetId(array(
		'descripcion'  => $request->get('descripcion'),
		'solicitud_id'  => $request->get('solicitud_id'),
		'estatus_id' => 9,
		'created_at' => new \DateTime,
		'updated_at' =>  new \Datetime,
	  ));

	  foreach ($insumos  as $insumo){

		$proveedores = 'proveedor_id'.$insumo->insumo_id;

		foreach ($request->get($proveedores) as $proveedor){

		  /******************Proceso de la imagen***************/
			//$file = Input::file('foto');
		   $file = Input::file('foto'.$insumo->insumo_id.$proveedor);

			  if($file){

				  try {

					$image = \Intervention\Image\Facades\Image::make($file);

				  } catch (Exception $e) {

					return redirect()->back()->withErrors('Error: ' . $e->getMessage());

				  }

				  //Ruta donde queremos guardar las imagenes
				  $path = public_path().'/catalogos-img/';

				  // Guardar Original
				  $image->save($path.$catalogoId.$file->getClientOriginalName());

				  $nombrefoto = $catalogoId.$file->getClientOriginalName();

			  }else $nombrefoto=NULL;

		  /*****************fin proceso de la imagen************/

		  $precio = 'precio'.$insumo->insumo_id.$proveedor;

		  $data= [
			'catalogo_id'  => $catalogoId,
			'proveedor_id'  => $proveedor,
			'precio'  => $request->get($precio),
			'insumo_id'  => $insumo->insumo_id,
			'estatus_id'  => 10,
			'created_at' => new \DateTime,
			'updated_at' =>  new \Datetime,
			'foto' => $nombrefoto
		  ];

		  //dd($data);

		  CatalogosInsumos::create($data);

		}

	  }

	  $solicitud = DB::table('solicitudes')->where('id', '=', $request->get('solicitud_id'))
		->update(array('id_estatus' => 16));



	  Flash::success('Solicitud Guardada correctamente.');

	  $user = User::findOrFail(\Auth::user()->id);

	  Mail::send('emails.solicitud', ['user' => $user], function ($m) use ($user) {
		$m->to($user->email, $user->name)->subject('Tu Solicitud a sido registrada');
	  });



	  return redirect(route('solicitudes.listado'));


	  /*foreach ($request->get('insumo') as $insumos)
      {
        $data[]= [
          'solicitud_id'  => $solicitudesId,
          'insumo_id'  => $insumos,
          'created_at' => new \DateTime,
          'updated_at' =>  new \Datetime,
        ];
      }*/

	  // dd($data);
	  //InsumosSolicitudes::create($data);


	  //$this->solicitudesRepository->create($data);

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

	public function detalle(Request $request)
	{


	  $proveedores = ProveedoresInsumos::join('proveedores','proveedores.id','=','proveedores_insumos.proveedor_id')
		->where('proveedores_insumos.insumo_id','=',$request->get('id_insumo'))
		->orderBy('proveedores.id', 'DESC')->get();

	  // dd($proveedores);

	 //  return response()->json($proveedores);

	  // return $proveedores->toJson();

	  return json_encode($proveedores);

	}
}
