@extends('layout.admin')

@section('content')
    {!! Form::open(['route' => 'admin.servicios.store', 'method' => 'POST', 'files' => 'true']) !!}
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Crear Servicio</h3>
            <a class="btn btn-sm bg-navy pull-right" href="{{ route('admin.servicios.index') }}">
                <i class="fa fa-list-alt"></i> Lista de Servicios
            </a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre Servicio:', ['class' => 'control-label', ]) !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control','id' => 'servicio-nombre']) !!}
                    </div>
                    <div class=" form-group">
                        {!! Form::label('descripcion', 'Descripcion Servicio:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' =>'3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ponderacion', 'Pronderación Servicio:', ['class' => 'control-label', ]) !!}
                        {!! Form::selectRange('ponderacion', 1,10,null, ['class' => 'form-control','id' => 'servicio-ponderacion']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('precio', 'Precio Servicio:', ['class' => 'control-label', ]) !!}
                        {!! Form::text('precio', null, ['class' => 'form-control','id' => 'servicio-precio']) !!}
                    </div>

                </div>
                <div class="col-md-6">

                    @if(isset($idTipo))
                        {!! Form::hidden('tipo-servicio', $idTipo, ['class' => 'form-control','id' => 'tipo-servicio']) !!}
                    @else
                        <div class="form-group">
                            {!! Form::label('categoria', 'Categoria Servicio:', ['class' => 'control-label', ]) !!}
                            {!! Form::select('categoria', $categorias,null, ['class' => 'form-control','id' => 'servicio-categoria']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('', 'Tipo Servicio:', ['class' => 'control-label', ]) !!}
                            {!! Form::select('tipo-servicio', null,null, ['class' => 'form-control','id' => 'tipo-servicio']) !!}
                        </div>
                    @endif

                    <div class="form-group">
                        {!! form::label('image','Imagen Categoria:', ['class' => 'control-label'])!!}
                        <input name="foto" id="categoria-foto" type="file" class="file"  >
                    </div>
                </div>

                <div class="col-xs-12 text-right">
                    {!! Form::submit('Guardar Servicio', ['class' => 'btn bg-blue-active procesarForm ']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('assets/plugins/fileinput/js/fileinput.min.js') !!}
    {!! Html::script('assets/plugins/fileinput/js/fileinput_locale_es.js') !!}
    {!! Html::script('assets/js/admin/servicios_create.js') !!}
@endsection


@section('styles')
    {!! Html::style('assets/plugins/fileinput/css/fileinput.min.css') !!}
@endsection