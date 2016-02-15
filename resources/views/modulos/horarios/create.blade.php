@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'horarios.store']) !!}
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Crear Horarios</h3>
            </div>
                @include('modulos.horarios.fields')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
