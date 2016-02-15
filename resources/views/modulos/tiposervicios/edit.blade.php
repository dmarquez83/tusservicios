@extends('layout.app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('modulos.common.errors')
            {!! Form::model($tiposervicio, ['route' => ['admin.tiposervicios.update', $tiposervicio->id], 'method' => 'patch']) !!}
                @include('modulos.tiposervicios.fields_edit')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
