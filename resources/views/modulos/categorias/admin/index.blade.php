@extends('layout.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">Lista de Categorias</h3>
                    <a class="btn bg-navy btn-sm pull-right " href="{!! route('admin.categorias.create') !!}">
                        <i class="fa fa-plus-square"></i>&nbsp;Agregar Categorias
                    </a>
                </div>
                <div class="box-body">

                    <table id="categorias-list" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">ID</th>
                            <th class="text-center" style="width: 30%;">Categoria</th>
                            <th class="text-center" style="width: 50%;">Descripción</th>
                            <th class="text-center" style="width: 10%;">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                            <tr>
                                <td>{{$categoria->id}}</td>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->descripcion}}</td>
                                <td>
                                    <div class="col-xs-6">
                                        <a class="btn btn-sm bg-blue-active" href="{!! route('admin.categorias.show', $categoria->id) !!}" role="button" data-toggle="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a class="btn btn-sm bg-red" href="{!! route('admin.categorias.delete', [$categoria->id]) !!}" role="button" data-toggle="Eliminar">
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
    {!! Html::script('assets/js/admin/categorias_index.js') !!}
@endsection

@section('styles')
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

