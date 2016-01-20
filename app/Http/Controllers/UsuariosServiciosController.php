<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuariosServiciosRequest;
use App\Http\Requests\UpdateUsuariosServiciosRequest;
use App\Libraries\Repositories\UsuariosServiciosRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\Horas;
use App\Models\Dias;
use App\Models\Servicios;
use App\Models\Horarios;
use App\Models\Lugares;
use App\Models\UsuariosServicios;
use App\User;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\DB;

class UsuariosServiciosController extends AppBaseController
{

	/** @var  UsuariosServiciosRepository */
	private $usuariosServiciosRepository;

	function __construct(UsuariosServiciosRepository $usuariosServiciosRepo)
	{
		$this->usuariosServiciosRepository = $usuariosServiciosRepo;
	}

	/**
	 * Display a listing of the UsuariosServicios.
	 *
	 * @return Response
	 */
	public function index()
	{
       if (auth()->user()->id_tipo_usuario == '1'){
		 $usuariosServicios = DB::table('usuarios_servicios')
		   ->join('servicios', 'servicios.id', '=', 'usuarios_servicios.servicio_id')
		   ->join('users', 'users.id', '=', 'usuarios_servicios.user_id')
		   ->select('usuarios_servicios.id','usuarios_servicios.servicio_id', 'usuarios_servicios.user_id','servicios.nombre','servicios.descripcion','servicios.foto','users.name')
		   ->orderBy('servicios.id','desc')
		   ->get();
	   }else{
		 $usuariosServicios = DB::table('usuarios_servicios')
		   ->join('servicios', 'servicios.id', '=', 'usuarios_servicios.servicio_id')
		   ->join('users', 'users.id', '=', 'usuarios_servicios.user_id')
		   ->where('user_id',\Auth::user()->id)
		   ->select('usuarios_servicios.id','usuarios_servicios.servicio_id', 'usuarios_servicios.user_id','servicios.nombre','servicios.descripcion','servicios.foto','users.name')
		   ->orderBy('servicios.id','desc')
		   ->get();
	   }


		return view('usuariosServicios.index')
			->with('usuariosServicios', $usuariosServicios);
	}

	/**
	 * Show the form for creating a new UsuariosServicios.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = Categoria::orderBy('id', 'asc')->lists('nombre', 'id');

		$servicios = Servicios::orderBy('id', 'asc')->lists('nombre', 'id');

		$ciudades = Ciudad::get();

		$horas = Horas::get();

		$dias = Dias::get();

		return view('usuariosServicios.create', compact('ciudades','categorias','horas','dias','servicios'));

	}

	/**
	 * Store a newly created UsuariosServicios in storage.
	 *
	 * @param CreateUsuariosServiciosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsuariosServiciosRequest $request)
	{

		$usuarioServiciosId = \DB::table('usuarios_servicios')->insertGetId(array(
		'servicio_id'  => $request->get('servicio_id'),
		'user_id'  => \Auth::user()->id,
		'created_at' => new \DateTime,
		'updated_at' =>  new \Datetime,
		));

		if($request->get('horario')){

			foreach ($request->get('horario') as $horario)
			{
				$id = explode('-',$horario);
				$data= [
					'usuario_servicio_id'  => $usuarioServiciosId,
					'dia_id'  => $id[0],
					'hora_id'  =>  $id[1],
					'created_at' => new \DateTime,
					'updated_at' =>  new \Datetime,
				];
				Horarios::create($data);
			}

		}

		if($request->get('sectores')){

			//dd($request);

			foreach ($request->get('sectores') as $sectores)
			{

				$data2= [
					'usuario_servicio_id'  => $usuarioServiciosId,
					'sector_id'  => $sectores,
					'created_at' => new \DateTime,
					'updated_at' =>  new \Datetime,
				];

				$lugares = Lugares::create($data2);
			}

		}


		Flash::success('Tus Horario y Lugar de Trabajo a sido Guardado.');

		return redirect(route('usuario.servicios.index'));
	}

	/**
	 * Display the specified UsuariosServicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('UsuariosServicios not found');

			return redirect(route('usuario.servicios.index'));
		}

		return view('usuariosServicios.show')->with('usuariosServicios', $usuariosServicios);
	}

	/**
	 * Show the form for editing the specified UsuariosServicios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('No hay registros');

			return redirect(route('usuario.servicios.index'));
		}

	    //$horarios = Horarios::where('usuario_servicio_id','=',$id)->get();

	    $lugares = DB::table('lugares')
		  ->join('sectores','sectores.id','=','lugares.sector_id')
		  ->select('lugares.id','sectores.nombre','sectores.id as sector_id')
		  ->where('lugares.usuario_servicio_id','=',$id)
		  ->get();


        $categorias = Categoria::orderBy('id', 'asc')->lists('nombre', 'id');

	    $defaultSelection = [''=>'Seleccione una Opcion'];
	    $categorias = $defaultSelection + $categorias->toArray();

	    $servicios = Servicios::orderBy('id', 'asc')->lists('nombre', 'id');

	     $catservicios = DB::table('servicios')
		->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
		->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
		->where('servicios.id','=',$usuariosServicios->servicio_id)
		->select('servicios.id as id','servicios.nombre','servicios.descripcion','servicios.id_tipo_servicio','servicios.id_estatus','servicios.ponderacion','servicios.created_at','servicios.updated_at','servicios.foto as foto','categorias.id as id_categoria')
		->first();

		$ciudades = Ciudad::get();

		$horas = Horas::get();

		$dias = Dias::get();

	    $horarios = DB::select('select a.hora,
							  (select cast(ho.id as varchar)||cast(di.id as varchar) from horarios c, horas ho, dias di where
							  c.usuario_servicio_id = ? and
							  c.hora_id=ho.id and
							  c.dia_id=di.id and
							  c.hora_id=a.id and
							  di.id=1
							  ) as lunes,
							  (select cast(ho.id as varchar)||cast(di.id as varchar) from horarios c, horas ho, dias di where
							  c.usuario_servicio_id = ? and
							  c.hora_id=ho.id and
							  c.dia_id=di.id and
							  c.hora_id=a.id and
							  di.id=2
							  ) as martes,
							  (select cast(ho.id as varchar)||cast(di.id as varchar) from horarios c, horas ho, dias di where
							  c.usuario_servicio_id = ? and
							  c.hora_id=ho.id and
							  c.dia_id=di.id and
							  c.hora_id=a.id and
							  di.id=3
							  ) as miercoles,
							  (select cast(ho.id as varchar)||cast(di.id as varchar) from horarios c, horas ho, dias di where
							  c.usuario_servicio_id = ? and
							  c.hora_id=ho.id and
							  c.dia_id=di.id and
							  c.hora_id=a.id and
							  di.id=4
							  ) as jueves,
							  (select cast(ho.id as varchar)||cast(di.id as varchar) from horarios c, horas ho, dias di where
							  c.usuario_servicio_id = ? and
							  c.hora_id=ho.id and
							  c.dia_id=di.id and
							  c.hora_id=a.id and
							  di.id=5
							  ) as viernes,
							  (select cast(ho.id as varchar)||cast(di.id as varchar) from horarios c, horas ho, dias di where
							  c.usuario_servicio_id = ? and
							  c.hora_id=ho.id and
							  c.dia_id=di.id and
							  c.hora_id=a.id and
							  di.id=6
							  ) as sabado,
							  (select cast(ho.id as varchar)||cast(di.id as varchar) from horarios c, horas ho, dias di where
							  c.usuario_servicio_id = ? and
							  c.hora_id=ho.id and
							  c.dia_id=di.id and
							  c.hora_id=a.id and
							  di.id=7
							  ) as domingo,
                              a.id as id
							  from horas as a
							   order by a.id
							   ', array($id,$id,$id,$id,$id,$id,$id));

	  return view('usuariosServicios.edit', compact('usuariosServicios','ciudades','categorias','horas','dias','servicios','horarios','lugares'));

	}

	/**
	 * Update the specified UsuariosServicios in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUsuariosServiciosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUsuariosServiciosRequest $request)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('No hay Registros');

			return redirect(route('usuario.servicios.index'));
		}

	   $datos = array(
		  'servicio_id'  => $request->get('servicio_id'),
		  'user_id'  => \Auth::user()->id,
		  'created_at' => new \DateTime,
		  'updated_at' =>  new \Datetime,
		);

	  $this->usuariosServiciosRepository->updateRich($datos, $id);



	  if($request->get('horario')){

		Horarios::where('usuario_servicio_id', '=', $id)->delete();

		foreach ($request->get('horario') as $horario)
		{
		  $idH = explode('-',$horario);
		  $data= [
			'usuario_servicio_id'  => $id,
			'dia_id'  => $idH[0],
			'hora_id'  =>  $idH[1],
			'created_at' => new \DateTime,
			'updated_at' =>  new \Datetime,
		  ];

		  Horarios::create($data);
		}

	  }

	  if($request->get('sectores')){

		Lugares::where('usuario_servicio_id', '=', $id)->delete();

		foreach ($request->get('sectores') as $sectores)
		{

		  $data2= [
			'usuario_servicio_id'  => $id,
			'sector_id'  => $sectores,
			'created_at' => new \DateTime,
			'updated_at' =>  new \Datetime,
		  ];

		  $lugares = Lugares::create($data2);
		}

	  }

		Flash::success('Horario y Lugar Actualizados Correctamente');

		return redirect(route('usuario.servicios.index'));
	}

	/**
	 * Remove the specified UsuariosServicios from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuariosServicios = $this->usuariosServiciosRepository->find($id);

		if(empty($usuariosServicios))
		{
			Flash::error('UsuariosServicios not found');

			return redirect(route('usuario.servicios.index'));
		}

		$this->usuariosServiciosRepository->delete($id);

		Flash::success('UsuariosServicios deleted successfully.');

		return redirect(route('usuario.servicios.index'));
	}

	public function desplegable()
	{
		$id = Input::get('option');

		$servicios = DB::table('servicios')
			->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
			->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
			->where('categorias.id','=',$id)
			->select('servicios.id', 'servicios.nombre')
			->get();
		//dd ($tiposervicios);
		return $servicios;
	}

  public function getLugares($id)
  {
	$lugares = DB::table('lugares')
	  ->join('sectores','sectores.id','=','lugares.sector_id')
	  ->select('lugares.id','sectores.nombre','sectores.id as sector_id')
	  ->where('lugares.usuario_servicio_id','=',$id)
	  ->get();

	return $lugares;
  }
}
