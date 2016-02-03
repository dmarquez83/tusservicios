<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateSolicitudesRequest;
use App\Http\Requests\UpdateSolicitudesRequest;

use App\Libraries\Repositories\ServiciosRepository;
use App\Libraries\Repositories\SolicitudesRepository;
use App\Libraries\Repositories\CategoriaRepository;

use App\Models\Categoria;
use App\Models\Servicios;
use App\Models\InsumosSolicitudes;
use App\User;
use App\Models\Solicitudes;
use App\Models\UsuariosSolicitudes;

use Flash;
use Response;
use Mail;

use Mitul\Controller\AppBaseController as AppBaseController;

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;



class SolicitudesCategoriasController extends AppBaseController
{

  /** @var  SolicitudesRepository */
	  private $solicitudesRepository;

	  function __construct(SolicitudesRepository $solicitudesRepo,  CategoriaRepository $categoriaRepo,ServiciosRepository $serviciosRepo)
	  {
		$this->solicitudesRepository = $solicitudesRepo;

		$this->categoriaRepository = $categoriaRepo;

		$this->serviciosRepository = $serviciosRepo;
	  }

	  /**
	   * Display a listing of the Solicitudes.
	   *
	   * @return Response
	   */
	  public function index()
	  {
		$categorias = $this->categoriaRepository->paginate(10);

		return view('solicitudes.index')->with('categorias', $categorias);
	  }

	  /**
	   * Show the form for creating a new Solicitudes.
	   *
	   * @return Response
	   */
	  public function create($id)
	  {
		/*ojo aqui debe venir ya el id del usuario que lo esta registrando preguntar si alguien sin registrarse puedde hacer una solicitud*/

		/*ojo aqui debe venir la categoria para seleccionar el tipo de servicio*/

		//	$servicios = Servicios::where('id', $id)->lists('nombre', 'id','descripcion');

		$servicios = $this->serviciosRepository->find($id);

		// dd($servicios);


		return view('solicitudes.create')->with('servicios', $servicios);

	  }


	  public function store($id, CreateSolicitudesRequest $request)
	  {
		$originalDate = $request->get('fecha');
		$newDate = date("Y-m-d", strtotime($originalDate));
		$servicios = Servicios::find($id);

		if($request->get('insumo')) {
		  $id_status=15;
		}else{
		  $id_status=3;
		}

		$solicitudesId = \DB::table('solicitudes')->insertGetId(array(
		  'descripcion'  => $request->get('descripcion'),
		  'fecha'  => $newDate,
		  'hora'  => $request->get('hora'),
		  'direccion'  => $request->get('direccion'),
		  'telefono'  => $request->get('telefono'),
		  'horas'  => $request->get('contacto'),
		  'costo'  => $servicios->precio,
		  'id_usuario'  => \Auth::user()->id,
		  'id_estatus'  => $id_status,
		  'id_servicio'  => $id,
		  'created_at' => new \DateTime,
		  'updated_at' =>  new \Datetime,
		));

		if($request->get('insumo')){

		  foreach ($request->get('insumo') as $insumos)
		  {
			$data= [
			  'solicitud_id'  => $solicitudesId,
			  'insumo_id'  => $insumos,
			  'created_at' => new \DateTime,
			  'updated_at' =>  new \Datetime,
			];
			InsumosSolicitudes::create($data);
		  }

		}

		Flash::success('Solicitud Guardada correctamente.');

		$user = User::findOrFail(\Auth::user()->id);

		Mail::send('emails.solicitud', ['user' => $user], function ($m) use ($user) {
			$m->to($user->email, $user->name)->subject('Tu Solicitud a sido registrada');
		});

		if($request->get('insumo')) {
		  return redirect(route('solicitudes.getlistado'));
		}else{
		  return redirect(route('solicitudes.detPago', array($solicitudesId)));
		}

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
		  Flash::error('No hay Solicitudes');

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
		  Flash::error('No hay Solicitudes');

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
		  Flash::error('No hay Solicitudes');

		  return redirect(route('solicitudes.index'));
		}

		$solicitudes = $this->solicitudesRepository->updateRich($request->all(), $id);

		Flash::success('Solicitudes updated successfully.');

		return redirect(route('solicitudes.index'));
	  }


	  public function listado()
	  {
		  $solicitudes = DB::table('solicitudes')
			  ->join('estatus','estatus.id' ,'=','solicitudes.id_estatus')
			  ->join('servicios','servicios.id' ,'=','solicitudes.id_servicio')
			  ->join('users','users.id' ,'=','solicitudes.id_usuario')
			  ->select('solicitudes.id','solicitudes.fecha', 'solicitudes.hora','solicitudes.descripcion','solicitudes.direccion','solicitudes.telefono','solicitudes.horas','solicitudes.costo','estatus.nombre as estatus','servicios.nombre as servicios','users.name as usuario','estatus.id as id_estatus')
			  ->orderBy('solicitudes.id','desc')
			  ->get();

		return view('solicitudes.indexsolicitudes')->with('solicitudes', $solicitudes);
	  }


	public function getListado()
	{
		$solicitudes = DB::table('solicitudes')
			->join('estatus','estatus.id' ,'=','solicitudes.id_estatus')
			->join('servicios','servicios.id' ,'=','solicitudes.id_servicio')
			->join('users','users.id' ,'=','solicitudes.id_usuario')
			->where('users.id','=',\Auth::user()->id)
			->select('solicitudes.id','solicitudes.fecha', 'solicitudes.hora','solicitudes.descripcion','solicitudes.direccion','solicitudes.telefono','solicitudes.horas','solicitudes.costo','estatus.nombre as estatus','servicios.nombre as servicios','users.name as usuario')
			->get();

		//dd($solicitudes);

		return view('solicitudes.indexsolicitudesusers')->with('solicitudes', $solicitudes);
	}

    public function getAsignar($id){

	  $solicitudes = DB::table('solicitudes')
		->join('estatus', 'estatus.id', '=', 'solicitudes.id_estatus')
		->join('servicios', 'servicios.id', '=', 'solicitudes.id_servicio')
		->join('users', 'users.id', '=', 'solicitudes.id_usuario')
		->where('solicitudes.id','=',$id )
		->select('solicitudes.id','solicitudes.fecha', 'solicitudes.hora','solicitudes.descripcion','solicitudes.direccion','solicitudes.telefono','solicitudes.horas','solicitudes.costo','estatus.nombre as estatus','servicios.nombre as servicios','users.name as usuario','solicitudes.id_servicio')
		->first();

	  //dd($solicitudes);

	  if(empty($solicitudes))
	  {
		Flash::error('No hay Solicitudes');

		return redirect(route('solicitudes.index'));
	  }

	  $usuariosServicios = DB::table('usuarios_servicios')
		->join('servicios', 'servicios.id', '=', 'usuarios_servicios.servicio_id')
		->join('users', 'users.id', '=', 'usuarios_servicios.user_id')
		->where('servicio_id', '=',$solicitudes->id_servicio)
		->select('usuarios_servicios.id','usuarios_servicios.servicio_id', 'usuarios_servicios.user_id','servicios.nombre','servicios.descripcion','servicios.foto','users.name','users.email')
		->orderBy('servicios.id','desc')
		->get();

	  //dd($usuariosServicios);

	  return view('solicitudes.indexasignar')->with(array('solicitudes'=>$solicitudes,'usuariosServicios'=>$usuariosServicios));

	  //ojo mandar los datos del horario y lugar de trabajo

	}

  public function asignar($id, UpdateSolicitudesRequest $request){

	//dd($request);

	$data= [
	  'solicitud_id'  => $id,
	  'user_id'  => $request->get('usuario'),
	  'id_estatus'  => 11,
	  'created_at' => new \DateTime,
	  'updated_at' =>  new \Datetime,
	];



	UsuariosSolicitudes::create($data);



	Flash::success('Usuario asignado correctamente');

	return redirect(route('solicitudes.listado'));

  }


	public function getDetSolicitud($id)
	{
		$solicitudes = DB::table('solicitudes')
			->join('estatus', 'estatus.id', '=', 'solicitudes.id_estatus')
			->join('servicios', 'servicios.id', '=', 'solicitudes.id_servicio')
			->join('users', 'users.id', '=', 'solicitudes.id_usuario')
			->where('users.id', '=', \Auth::user()->id)
			->where('solicitudes.id','=',$id )
			->select('solicitudes.id','solicitudes.fecha', 'solicitudes.hora','solicitudes.descripcion','solicitudes.direccion','solicitudes.telefono','solicitudes.horas','solicitudes.costo','estatus.nombre as estatus','servicios.nombre as servicios','users.name as usuario')
			->first();
		//dd($solicitudes);

		$insumos= DB::table('insumos_solicitudes')
			->join('solicitudes','solicitudes.id' ,'=','insumos_solicitudes.solicitud_id')
			->join('insumos','insumos.id' ,'=','insumos_solicitudes.insumo_id')
			->join('users','users.id' ,'=','solicitudes.id_usuario')
			->where('users.id','=',\Auth::user()->id )
			->where('insumos_solicitudes.solicitud_id','=',$id )
			->select('insumos_solicitudes.id','insumos_solicitudes.insumo_id', 'insumos.nombre','insumos.descripcion','insumos.referencia','insumos.foto')
			->get();
		//dd($insumos);

		$catalogos = DB::table('catalogos')
			->join('solicitudes','solicitudes.id' ,'=','catalogos.solicitud_id')
			->join('catalogos_insumos','catalogos_insumos.catalogo_id' ,'=','catalogos.id')
			->join('proveedores','proveedores.id' ,'=','catalogos_insumos.proveedor_id')
			->join('insumos','insumos.id' ,'=','catalogos_insumos.insumo_id')
			->join('estatus','estatus.id' ,'=','catalogos_insumos.estatus_id')
			->join('users','users.id' ,'=','solicitudes.id_usuario')
			->where('users.id','=',\Auth::user()->id )
			->where('catalogos.solicitud_id','=',$id )
			->select('catalogos.id','catalogos.descripcion','estatus.nombre as estatus', 'insumos.nombre as nombre_insumo','insumos.descripcion','insumos.referencia','insumos.foto','insumos.id as id_insumo',
				     'catalogos_insumos.precio','catalogos_insumos.id as id_catalogo','catalogos_insumos.foto as foto_proveedor','proveedores.rif','proveedores.nombre')
		    ->orderBy('insumos.id','desc')
			->get();
		//dd($catalogo);



		return view('solicitudes.indexDetSolicitud')->with(array('solicitudes'=>$solicitudes,'insumos'=>$insumos,'catalogos'=>$catalogos));
		//return view('solicitudes.indexDetSolicitud')->with('solicitudes', $solicitudes);
	}


  public function detPago($id)
  {
	$solicitudes = DB::table('solicitudes')
	  ->join('estatus', 'estatus.id', '=', 'solicitudes.id_estatus')
	  ->join('servicios', 'servicios.id', '=', 'solicitudes.id_servicio')
	  ->join('users', 'users.id', '=', 'solicitudes.id_usuario')
	  ->where('users.id', '=', \Auth::user()->id)
	  ->where('solicitudes.id','=',$id )
	  ->select('solicitudes.id','solicitudes.fecha', 'solicitudes.hora','solicitudes.descripcion','solicitudes.direccion','solicitudes.telefono','solicitudes.horas','solicitudes.costo','estatus.nombre as estatus','servicios.nombre as servicios','users.name as usuario','servicios.foto')
	  ->first();
/*filtrar por los insumos acpetados en el catalogo*/
	$catalogos = DB::table('catalogos')
	  ->join('solicitudes','solicitudes.id' ,'=','catalogos.solicitud_id')
	  ->join('catalogos_insumos','catalogos_insumos.catalogo_id' ,'=','catalogos.id')
	  ->join('proveedores','proveedores.id' ,'=','catalogos_insumos.proveedor_id')
	  ->join('insumos','insumos.id' ,'=','catalogos_insumos.insumo_id')
	  ->join('estatus','estatus.id' ,'=','catalogos_insumos.estatus_id')
	  ->join('users','users.id' ,'=','solicitudes.id_usuario')
	  ->where('users.id','=',\Auth::user()->id )
	  ->where('catalogos.solicitud_id','=',$id )
	  ->where('catalogos_insumos.estatus_id','=','17' )
	  ->select('catalogos.id','catalogos.descripcion','estatus.nombre as estatus', 'insumos.nombre as nombre_insumo','insumos.descripcion','insumos.referencia','insumos.foto',
		'catalogos_insumos.precio','catalogos_insumos.id as id_catalogo','catalogos_insumos.foto as foto_proveedor','proveedores.rif','proveedores.nombre')
	  ->get();
	//dd($catalogos);

	//dd($solicitudes);

	return view('solicitudes.indexDetPago')->with(array('solicitudes'=>$solicitudes));

  }

  public function getDetServicios($id)
  {
	$solicitudes = DB::table('solicitudes')
	  ->join('estatus', 'estatus.id', '=', 'solicitudes.id_estatus')
	  ->join('servicios', 'servicios.id', '=', 'solicitudes.id_servicio')
	  ->join('users', 'users.id', '=', 'solicitudes.id_usuario')
	  ->join('usuarios_solicitudes', 'usuarios_solicitudes.solicitud_id', '=', 'solicitudes.id')
	  ->where('usuarios_solicitudes.user_id','=', \Auth::user()->id )
	  ->where('solicitudes.id','=',$id )
	  ->select('solicitudes.id','solicitudes.fecha', 'solicitudes.hora','solicitudes.descripcion','solicitudes.direccion','solicitudes.telefono','solicitudes.horas','solicitudes.costo','estatus.nombre as estatus','servicios.nombre as servicios','users.name as usuario')
	  ->first();
	//dd($solicitudes);

	$insumos= DB::table('insumos_solicitudes')
	  ->join('solicitudes','solicitudes.id' ,'=','insumos_solicitudes.solicitud_id')
	  ->join('insumos','insumos.id' ,'=','insumos_solicitudes.insumo_id')
	  ->join('users','users.id' ,'=','solicitudes.id_usuario')
	  ->where('insumos_solicitudes.solicitud_id','=',$id )
	  ->select('insumos_solicitudes.id','insumos_solicitudes.insumo_id', 'insumos.nombre','insumos.descripcion','insumos.referencia','insumos.foto')
	  ->get();
	//dd($insumos);

	return view('solicitudes.indexDetServicios')->with(array('solicitudes'=>$solicitudes,'insumos'=>$insumos));
	//return view('solicitudes.indexDetSolicitud')->with('solicitudes', $solicitudes);
  }

  public function getAceptarServicios($id){

	$aceptar = DB::table('usuarios_solicitudes')->where('solicitud_id', '=', $id)
	  ->update(array('id_estatus' => 12));

	$solicitud = DB::table('solicitudes')->where('id', '=', $id)
	  ->update(array('id_estatus' => 4));

	Flash::success('Solicitud Aceptada .');

	return redirect(route('solicitudes.getUsuariosSolicitudes'));

  }

  public function getRechazarServicios($id){

	$rechazar = DB::table('usuarios_solicitudes')->where('solicitud_id', '=', $id)
	  ->update(array('id_estatus' => 13));

	$solicitud = DB::table('solicitudes')->where('id', '=', $id)
	  ->update(array('id_estatus' => 14));

	Flash::success('Solicitud Rechazada .');

	return redirect(route('solicitudes.getUsuariosSolicitudes'));

  }

  public function getAceptarInsumosSolicitud($id, Request $request){

	//dd($request);

	//voy por aqui falta que cambie el estatus de los insumos que acepta el usuario

	foreach ($request->get('catalogo') as $catalogo)
	{
	  $aceptar = DB::table('catalogos_insumos')->where('id', '=', $catalogo)
		->update(array('estatus_id' => 17));

	}

	$aceptarSolicitud = DB::table('solicitudes')->where('id', '=', $request->get('id'))
	  ->update(array('id_estatus' => 18));

	return redirect(route('solicitudes.detPago', array($request->get('id'))));

  }


}
