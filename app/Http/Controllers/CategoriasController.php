<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\File;


class CategoriasController extends Controller
{

    var $modulo = 'Categorias';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoria::all();

        return view('modulos.categorias.admin.index')
            ->with([
                'categorias' => $categorias,
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
        return view('modulos.categorias.admin.create')->with([
            'appModulo' => $this->modulo,
            'appOpcion' => 'Registrar'
        ]);
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
            'nombre' => 'required|unique:categorias|max:100',
            'descripcion' => 'required|max:255',
            'foto'  => 'required'
        ]);

        $data = [
            'nombre' => $request->get('nombre'),
            'descripcion' => ($request->get('descripcion')),
            //'foto' => $file->getClientOriginalName()
        ];

        $categoria = Categoria::create($data);

        /***************************/

        //Creamos una instancia de la libreria instalada

        $image = \Intervention\Image\Facades\Image::make(Input::file('foto'));

        //Ruta donde queremos guardar las imagenes
        $path = public_path().'/assets/img/categorias-img/';

        // Guardar Original
        if($image->save($path.$categoria->id.'.jpg')){
            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$categoria->id.'.jpg');

            $categoria->foto = $categoria->id.'.jpg';
            $categoria->save();
        }

        /**************************/

        \Flash::success('Categoria Guardada Correctamente.');

        return redirect(route('admin.categorias.show',$categoria->id));
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
        $categoria = Categoria::findOrFail($id);

        return view('modulos.categorias.admin.show')->with(
            array(
                'categoria' => $categoria,
                'appModulo' => $this->modulo,
                'appOpcion' => 'Datos'
            )
        );
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
        $categoria = Categoria::findOrFail($id);

        return view('modulos.categorias.admin.edit')->with(
            array(
                'categoria' => $categoria,
                'appModulo' => $this->modulo,
                'appOpcion' => 'Editar'
            )
        );

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
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:255',
            //'foto'  => 'required'
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');

        //Creamos una instancia de la libreria instalada
        if($image = \Intervention\Image\Facades\Image::make(Input::file('foto'))) {

            //Ruta donde queremos guardar las imagenes
            $path = public_path() . '/assets/img/categorias-img/';

            // Guardar Original
            if ($image->save($path . $categoria->id . '.jpg')) {
                $categoria->foto = $categoria->id . '.jpg';
                // Cambiar de tamaño
                $image->resize(240, 200);
                // Guardar
                $image->save($path . 'thumb_' . $categoria->id . '.jpg');
            }
        }
        $categoria->save();

        \Flash::success('Categoria Actualizada Correctamente.');

        return redirect(route('admin.categorias.show',$categoria->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $categoria = Categoria::findOrFail($id);

        //
        if(count($categoria->tiposServicio) >= 1){
            //dd($categoria->tiposServicio);
            session()->flash('error','La categoria Posee tipos de servicios asociados');
            //$request->session()->flash('error','Posee Tipos de Servicios asociados');
        }else{
            $categoria->delete();
            session()->flash('message','Categoria eliminada Correctamente.');
        }

        return redirect()->route('admin.categorias.index');
    }
}
