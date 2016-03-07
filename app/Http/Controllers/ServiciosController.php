<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\File;

class ServiciosController extends Controller
{

    private $modulo = 'Servicios';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicios = Servicios::all();


        return view('modulos.servicios.admin.index')->with([
            'servicios' => $servicios,
            'appModulo' => $this->modulo,
            'appOpcion' => 'Listado'

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:255',
            'foto'  => 'required|image|mimes:jpg,jpeg',
            'ponderacion' => 'required|integer|min:1|max:10',
            'precio' => 'required|numeric',
            'tipo-servicio' => 'required|integer|exists:tiposervicios,id'
        ]);

        $data = [
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'id_tipo_servicio' => $request->get('tipo-servicio'),
            'ponderacion' => $request->input('ponderacion'),
            'precio' => $request->input('precio'),
            'id_estatus' => 1
        ];

        $servicio = Servicios::create($data);

        /***************************/

        //Creamos una instancia de la libreria instalada
        $image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

        //Ruta donde queremos guardar las imagenes
        $path = public_path().'/assets/img/servicios-img/';

        // Guardar Original
        if($image->save($path.$servicio->id.'.jpg')){
            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$servicio->id.'.jpg');

            $servicio->foto = $servicio->id.'.jpg';
            $servicio->save();
        }

        /**************************/


        return redirect()->route('admin.servicios.show',$servicio->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $servicio = Servicios::findOrFail($id);

        return view('modulos.servicios.admin.show')->with([
            'servicio' => $servicio,
            'appModulo' => $this->modulo,
            'appOpcion' => 'Datos'

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
