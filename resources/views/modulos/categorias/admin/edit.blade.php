@extends('layout.admin')

@section('content')
    {!! Form::open(['route' => ['admin.categorias.update',$categoria->id], 'method' => 'PUT', 'files' => 'true']) !!}
    <div class="col-xs-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Categoria</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre Categoria:', ['class' => 'control-label', ]) !!}
                            {!! Form::text('nombre', $categoria->nombre, ['class' => 'form-control','id' => 'categoria-nombre']) !!}
                        </div>
                        <div class=" form-group">
                            {!! Form::label('descripcion', 'Descripcion Categoria:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('descripcion', $categoria->descripcion, ['class' => 'form-control','rows' =>'3']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! form::label('image','Imagen Categoria:', ['class' => 'control-label'])!!}
                            <input name="foto" id="categoria-foto" type="file" class="file"  >
                        </div>
                    </div>

                    <div class="col-xs-12 text-right">
                        {!! Form::submit('Guardar Categoria', ['class' => 'btn bg-blue-active procesarForm ']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('assets/plugins/fileinput/js/fileinput.min.js') !!}
    {!! Html::script('assets/plugins/fileinput/js/fileinput_locale_es.js') !!}
    {!! Html::script('assets/js/admin/categorias_create.js') !!}
@endsection


@section('styles')
    {!! Html::style('assets/plugins/fileinput/css/fileinput.min.css') !!}
@endsection
