@extends('layout.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">Lista de Servicios</h3>

                    @if(isset($idTipo))
                        <a class="btn bg-navy btn-sm pull-right margin-left" href="{!! route('admin.tiposServicio.servicio.new',$idTipo) !!}">
                            <i class="fa fa-plus-square"></i>&nbsp;Agregar Servicio
                        </a>
                        <a class="btn bg-orange-active btn-sm pull-right margin-left" href="{!! route('admin.categorias.show',$idCat) !!}">
                            <i class="fa fa-list"></i>&nbsp;Detalle Categoria
                        </a>
                    @else
                        <a class="btn bg-navy btn-sm pull-right " href="{!! route('categorias.servicios.create') !!}">
                            <i class="fa fa-plus-square"></i>&nbsp;Agregar Servicio
                        </a>
                    @endif
                </div>
                <div class="box-body">

                    <table id="servicios-list" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">ID</th>
                            <th class="text-center" style="width: 20%;">Servicio</th>
                            <th class="text-center" style="width: 40%;">Descripción</th>
                            <th class="text-center" style="width: 20%;">Categoria</th>
                            <th class="text-center" style="width: 10%;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servicios as $servicio)
                            <tr>
                                <td class="text-center">{{ $servicio->id }}</td>
                                <td>{{ $servicio->nombre }}</td>
                                <td>{{ $servicio->descripcion }}</td>
                                <td>{{ $servicio->nombre_categoria }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a class="btn btn-sm bg-blue-active" href="{!! route('admin.servicios.show', $servicio->id) !!}" role="button" data-toggle="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm bg-red" href="{!! route('admin.servicios.delete', [$servicio->id]) !!}" role="button" data-toggle="Eliminar">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/js/admin/servicios_index.js') !!}
@endsection

@section('styles')
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection