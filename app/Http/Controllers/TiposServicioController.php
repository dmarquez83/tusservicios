<?php

namespace App\Http\Controllers;

use App\Models\TiposServicio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TiposServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'tipo-name-new' => 'required|max:100',
            'tipo-descripcion-new' => 'required|max:255',
            'categoria_id' => 'required|integer|exists:categorias,id'
        ]);

        $tipoServicio = new TiposServicio();
        $tipoServicio->nombre = $request->input('tipo-name-new');
        $tipoServicio->descripcion = $request->input('tipo-descripcion-new');
        $tipoServicio->id_categoria = $request->input('categoria_id');
        $tipoServicio->save();

        session()->flash('message','Tipo de Servicios Creado');

        return redirect()->route('admin.categorias.show',$tipoServicio->id_categoria);

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

        $this->validate($request, [
            'tipo-name' => 'required|max:100',
            'tipo-descripcion' => 'required|max:255',
        ]);

        $tipoServicio = TiposServicio::findOrFail($id);
        $tipoServicio->nombre = $request->input('tipo-name');
        $tipoServicio->descripcion = $request->input('tipo-descripcion');
        $tipoServicio->save();

        return redirect()->route('admin.categorias.show',$tipoServicio->id_categoria);
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

        $tipoServicio = TiposServicio::findOrFail($id);

        $idCat = $tipoServicio->id_categoria;

        if(count($tipoServicio->servicios) >= 1){
            \Flash::error('Posee Servicios asociados');
        }else{
            $tipoServicio->delete();
            session()->flash('message','Tipo de Servicio Eliminado Correctamente.');
        }

        return redirect()->route('admin.categorias.show',$idCat);
    }

    public function services($id){

        $tipoServicio = TiposServicio::findOrFail($id);
        $servicios = $tipoServicio->servicios;

        return view('modulos.servicios.admin.index')->with([
            'servicios' => $servicios,
            'appModulo' => 'Servicios',
            'appOpcion' => 'Listado > Tipo >'.$tipoServicio->nombre,
            'idCat' => $tipoServicio->categoria->id,
            'idTipo' => $tipoServicio->id
        ]);

    }

    public function createService($id){

        return view('modulos.servicios.admin.create')->with([
            'appModulo' => 'Servicios',
            'appOpcion' => 'Registrar',
            'idTipo' => $id
        ]);

    }
}
