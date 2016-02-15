@extends('layout.app')

@section('content')
<div>
    @include('modulos.common.errors')

    {!! Form::model($horas, ['route' => ['admin.horas.update', $horas->id], 'method' => 'patch']) !!}
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Editar Hora</h3>
            </div>
            @include('modulos.horas.fields')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
