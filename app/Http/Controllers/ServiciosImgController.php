<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;

use App\Libraries\Repositories\ServiciosRepository;

use App\Models\Ponderacion;
use App\Models\Servicios;
use App\Models\Tiposervicio;
use App\Models\Estatu;


class ServiciosImgController extends Controller
{

    /**
     * Display a listing of the Servicios.
     *
     * @return Response
     */
    public function index()
    {
        $servicios = Servicios::all();

        /*$servicios = Servicios::join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
            ->orderBy('servicios.id', 'asc')
            ->lists('servicios.nombre', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','servicios.id_estatus','servicios.ponderacion');*/

        /*$servicios = DB::table('servicios')
        ->join('tiposervicios','tiposervicios.id' ,'=','servicios.id_tipo_servicio')
        ->join('estatus','estatus.id' ,'=','servicios.id_estatus')
        ->join('ponderacions','ponderacions.id' ,'=','servicios.ponderacion')
        ->select('servicios.nombre', 'servicios.id','servicios.descripcion','tiposervicios.nombre as nombre_tipo_servicio','estatus.nombre as nombre_estatus','ponderacions.nombre as nombre_ponderacion')
        ->get();
*/

        return view('servicios.index')
            ->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposervicios = Tiposervicio::where('id_categoria','6')->orderBy('id', 'asc')->lists('nombre', 'id');

        $estatu = Estatu::where('tabla','servicios')->orderBy('id', 'asc')->lists('nombre', 'id');

        $ponderacion = Ponderacion::orderBy('id', 'asc')->lists('nombre','valor', 'id');

        //$email = DB::table('users')->where('name', 'John')->value('email');

        return view('servicios.create', compact('tiposervicios','estatu','ponderacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $file = Input::file('foto');
        //Creamos una instancia de la libreria instalada

        $image = \Intervention\Image\Facades\Image::make(Input::file('foto'));
     //   $image = Image::make(Input::file('image'));

        //Ruta donde queremos guardar las imagenes
        $path = public_path().'/thumbnails/';

        // Guardar Original
        $image->save($path.$file->getClientOriginalName());
        // Cambiar de tamaño
        $image->resize(240,200);
        // Guardar
        $image->save($path.'thumb_'.$file->getClientOriginalName());


       // return redirect()->route('thumbnail.index');

        return view('servicios.index');
    }


}
