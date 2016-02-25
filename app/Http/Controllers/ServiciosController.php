<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateServiciosRequest;
use App\Http\Requests\UpdateServiciosRequest;

use App\Libraries\Repositories\ServiciosRepository;
use App\Libraries\Repositories\CategoriaRepository;
use App\Libraries\Repositories\TiposervicioRepository;
use App\Libraries\Repositories\PonderacionRepository;
use App\Libraries\Repositories\EstatuRepository;


use Flash;
use Response;
use Mitul\Controller\AppBaseController as AppBaseController;
use Exception;


use Illuminate\Support\Collection as Collection;


use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\DB;

use App\Models\Ponderacion;
use App\Models\Servicios;
use App\Models\Tiposervicio;
use App\Models\Estatu;
use App\Models\Categoria;


class ServiciosController extends AppBaseController
{

  /** @var  ServiciosRepository */
  private $serviciosRepository;

  function __construct(ServiciosRepository $serviciosRepo,  CategoriaRepository $categoriaRepo, EstatuRepository $estatuRepo, PonderacionRepository $ponderacionRepo, TiposervicioRepository $tiposervicioRepo)
  {
	$this->serviciosRepository = $serviciosRepo;

	$this->categoriaRepository = $categoriaRepo;

	$this->estatuRepository = $estatuRepo;

	$this->ponderacionRepository = $ponderacionRepo;

	$this->tiposervicioRepository = $tiposervicioRepo;
  }

  /**
   * Display a listing of the Servicios.
   *
   * @return Response
   */
  public function index()
  {
	$categorias = $this->categoriaRepository->paginate(10);

	return view('modulos.servicios.index')->with('categorias', $categorias);
  }


  /**
   * Display a listing of the Tiposervicio.
   *
   * @return Response
   */
  public function indexservicio()
  {

	$servicios1 = DB::table('servicios')
	  ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
	  ->join('estatus','estatus.id' ,'=','servicios.id_estatus')
	  ->join('ponderacions','ponderacions.id' ,'=','servicios.ponderacion')
	  ->select('servicios.nombre','servicios.foto', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','estatus.nombre as nombre_estatus','ponderacions.nombre as nombre_ponderacion')
	  ->get();

	//este query de devuelve un arreglo lo convierto en una collection para enviarselo a la vista

	$servicios = Collection::make($servicios1);

	//dd($servicios);

	//return response()->json($servicios);


	return view('modulos.servicios.indexservicios')->with('servicios', $servicios);

  }

  /**
   * Show the form for creating a new Servicios.
   *
   * @return Response
   */
  public function create()
  {
    $categorias = Categoria::orderBy('id', 'asc')->lists('nombre', 'id');

	$tiposervicios = Tiposervicio::orderBy('id', 'asc')->lists('nombre', 'id');

	$estatu = Estatu::where('tabla','servicios')->orderBy('id', 'asc')->lists('nombre', 'id');

	$ponderacion = Ponderacion::orderBy('id', 'asc')->lists('nombre','valor', 'id');

	//$email = DB::table('users')->where('name', 'John')->value('email');

	return view('modulos.servicios.create', compact('tiposervicios','estatu','ponderacion','categorias'));
  }


  /**
   * Show the form for editing the specified Tiposervicio.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function createnew($id)
  {

	//return $id;
	//$tiposervicios = $this->tiposervicioRepository->all();

	$tiposervicios = Tiposervicio::where('id_categoria',$id)->orderBy('id', 'asc')->lists('nombre', 'id');

	//dd($tiposervicios);

	$estatu = Estatu::where('tabla','servicios')->orderBy('id', 'asc')->lists('nombre', 'id');

	$ponderacion = Ponderacion::orderBy('id', 'asc')->lists('nombre','valor', 'id');


	return view('modulos.servicios.create', compact('tiposervicios','estatu','ponderacion'));
  }

  /**
   * Store a newly created Servicios in storage.
   *
   * @param CreateServiciosRequest $request
   *
   * @return Response
   */


  public function store(CreateServiciosRequest $request)
  {

	$this->validate($request, [
	  'nombre' => 'required|unique:categorias|max:255',
	  'descripcion' => 'required|max:500',
	  'foto'  => 'required',
	  'tiposervicio_id' => 'required',
	  'precio'  => 'required'
	]);
	/***************************/

	$file = Input::file('foto');
	//Creamos una instancia de la libreria instalada

	try {

	  	$image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

	} catch (Exception $e) {

	  	return redirect()->back()->withErrors('Error: ' . $e->getMessage());

	}

	//Ruta donde queremos guardar las imagenes
	$path = public_path().'/assets/img/servicios-img/';

	// Guardar Original
	$image->save($path.$file->getClientOriginalName());
	// Cambiar de tamaño
	$image->resize(240,200);
	// Guardar
	$image->save($path.'thumb_'.$file->getClientOriginalName());

	/*ojo esta fallando cuano la imagen es grande cuando pesa mb y ademas me falta eliminar la imagen cuando elimino e registro*/


	/**************************/


	$data = [
	  'nombre' => $request->get('nombre'),
	  'descripcion' => ($request->get('descripcion')),
	  'id_tipo_servicio' => $request->get('tiposervicio_id'),
	  'id_estatus' => '1',
	  'ponderacion' => $request->get('ponderacion'),
	  'foto' => $file->getClientOriginalName(),
	  'precio' => $request->get('precio')
	];


	$servicios = $this->serviciosRepository->create($data);

	$message = $servicios ? 'Servicios Guardado Correctamente.!' : 'Servicios no pudo ser guardado.!';

	Flash::success($message);

	return redirect()->route('admin.servicios.index')->with('message', $message);
  }



  /**
   * Display the specified Servicios.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function show($id)
  {



	$servicios = $this->serviciosRepository->find($id);


	if(empty($servicios))
	{
	  Flash::error('Servicios not found');

	  return redirect(route('servicios.index'));
	}

	return view('modulos.servicios.show')->with('servicios', $servicios);
  }

  /**
   * Show the form for editing the specified Servicios.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function edit($id)
  {
	$servicios = DB::table('servicios')
	  ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
	  ->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
	  ->where('servicios.id','=',$id)
	  ->select('servicios.id as id','servicios.nombre','servicios.descripcion','servicios.id_tipo_servicio','servicios.id_estatus','servicios.ponderacion','servicios.created_at','servicios.updated_at','servicios.foto as foto','categorias.id as id_categoria')
	  ->get();

	//este query de devuelve un arreglo lo convierto en una collection para enviarselo a la vista

	//$servicios = Collection::make($servicios);

	$value= $servicios[0]->id_categoria;
	//$value = $servicios1->lists('id_categoria');

	//$tiposervicios = Tiposervicio::where('id_categoria',$value)->orderBy('id', 'asc')->lists('nombre', 'id');

	$tiposervicios = Tiposervicio::orderBy('id', 'asc')->lists('nombre', 'id');

	$estatu = Estatu::where('tabla','servicios')->orderBy('id', 'asc')->lists('nombre', 'id');

	$ponderacion = Ponderacion::orderBy('id', 'asc')->lists('nombre','valor', 'id');

	$categorias = Categoria::orderBy('id', 'asc')->lists('nombre', 'id');

	if(empty($servicios))
	{
	  Flash::error('Servicios not found');

	  return redirect(route('categorias.servicios.index'));
	}

	return view('modulos.servicios.edit')->with(array('servicios'=>$servicios,'tiposervicios'=>$tiposervicios,'estatu'=>$estatu,'ponderacion'=>$ponderacion,'categorias'=>$categorias));
  }

  /**
   * Update the specified Servicios in storage.
   *
   * @param  int              $id
   * @param UpdateServiciosRequest $request
   *
   * @return Response
   */
  public function update($id, UpdateServiciosRequest $request)
  {
     //
	/***************************muy importante , 'files' => 'true' esto debe ir en la cabecera del form de lo contrario da error con la imagen por que no la consigue Image source not readable*/

	  /***************************/
	  if(Input::file('foto')==null) {
		  $file = Input::file('foto_name');
		  $data = [
			  'nombre' => $request->get('nombre'),
			  'descripcion' => ($request->get('descripcion')),
			  'id_tipo_servicio' => $request->get('tiposervicio_id'),
			  'id_estatus' => $request->get('id_estatus'),
			  'ponderacion' => $request->get('ponderacion')
		  ];
	  }
	  else{
		  $file = Input::file('foto');
		  //Creamos una instancia de la libreria instalada

		  $image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

		  //Ruta donde queremos guardar las imagenes
		  $path = public_path().'/assets/img/servicios-img/';

		  // Guardar Original
		  $image->save($path.$file->getClientOriginalName());
		  // Cambiar de tamaño
		  $image->resize(240,200);
		  // Guardar
		  $image->save($path.'thumb_'.$file->getClientOriginalName());

		  $data = [
			  'nombre' => $request->get('nombre'),
			  'descripcion' => ($request->get('descripcion')),
			  'id_tipo_servicio' => $request->get('tiposervicio_id'),
			  'id_estatus' => $request->get('id_estatus'),
			  'ponderacion' => $request->get('ponderacion'),
			  'foto' => $file->getClientOriginalName(),
		  ];
	  }
	  /**************************/


	if(empty($data))
	{
	  Flash::error('No hay Servicios');

	  return redirect(route('categorias.servicios.index'));
	}

	$servicios = $this->serviciosRepository->updateRich($data, $id);

	Flash::success('Servicios updated successfully.');

	return redirect(route('admin.servicios.index'));
  }

  /**
   * Remove the specified Servicios from storage.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function destroy($id)
  {
	$servicios = $this->serviciosRepository->find($id);

	if(empty($servicios))
	{
	  Flash::error('Servicios not found');

	  return redirect(route('categorias.servicios.index'));
	}

	$this->serviciosRepository->delete($id);

	Flash::success('Servicio Borrado Correctamente.');

	return redirect(route('admin.servicios.index'));
  }

	public function listar()
	{

		$servicios1 = DB::table('servicios')
			->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
			->join('estatus','estatus.id' ,'=','servicios.id_estatus')
			->join('ponderaciones','ponderaciones.id' ,'=','servicios.ponderacion')
			->select('servicios.nombre','servicios.foto', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','estatus.nombre as nombre_estatus','ponderaciones.nombre as nombre_ponderacion')
			->get();

		//este query de devuelve un arreglo lo convierto en una collection para enviarselo a la vista

		$servicios = Collection::make($servicios1);

		//dd($servicios);

		//return response()->json($servicios);

        //var_dump($servicios);
		return view('modulos.servicios.indexListar')->with('servicios', $servicios);

	}

	public function detalle($id)
	{

		//$servicios = $this->serviciosRepository->find($id);

        $servicios = DB::table('servicios')
            ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
            ->join('estatus','estatus.id' ,'=','servicios.id_estatus')
            ->join('ponderaciones','ponderaciones.id' ,'=','servicios.ponderacion')
            ->select('servicios.nombre','servicios.foto', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','estatus.nombre as nombre_estatus','ponderaciones.nombre as nombre_ponderacion')
            ->where('servicios.id','=',$id)
            ->get();


		//$servicios = Servicios::findOrFail($id);

		if(empty($servicios))
		{
			Flash::error('Servicios not found');

			return redirect(route('servicios.index',$id));
		}

		return view('modulos.servicios.show')->with('servicios', $servicios);
	}

    public function detallecategorias($id)
    {
/*
		$categorias = DB::table('categorias')
            ->select('categorias.id', 'categorias.nombre', 'categorias.descripcion', 'categorias.foto')
            ->where('categorias.id','=',$id)
            ->get();



		//dd($categorias);

*/

		$categoria = Categoria::findOrFail($id);

        $servicios = DB::table('servicios')
            ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
            ->join('categorias','categorias.id' ,'=','tiposervicios.id_categoria')
            ->where('categorias.id','=',$categoria->id)
            ->select('servicios.*')
            ->get();
/*
		//dd($servicios);

        if(empty($categorias))
        {
            Flash::error('Servicios not found');

            //return redirect(route('servicios.index',$id));
        }

        $detcategoria = Collection::make($servicios);

		dd($detcategoria);
*/




        return view('modulos.categorias.show_categorias')->with(
			array(
				'categoria' => $categoria,
				'servicios' => $servicios
			)
		);

        //var_dump($detcategoria);

        //return view('servicios.listar')->with('servicios', $servicios);
    }

	public function desplegable()
	{
		$id = Input::get('option');
		//$tiposervicios = Categoria::find('1')->tiposervicio->lists('tiposervicio', 'id');
		//dd ($tiposervicios);
		//return $tiposervicios->lists('tiposervicios', 'id');
		$tiposervicios = Categoria::with('tiposervicio')->join('tiposervicios','tiposervicios.id_categoria','=','categorias.id')
			->where('tiposervicios.id_categoria','=',$id)
			->orderBy('categorias.id', 'DESC')->get();
		//dd ($tiposervicios);
		return $tiposervicios;
	}
}