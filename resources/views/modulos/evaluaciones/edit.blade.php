@extends('layout.app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('modulos.common.errors')

            {!! Form::model($evaluaciones, ['route' => ['admin.evaluaciones.update', $evaluaciones->id], 'method' => 'patch']) !!}

                @include('modulos.evaluaciones.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
