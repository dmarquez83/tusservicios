@extends('layout.app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">

            @include('modulos.common.errors')

            {!! Form::model($ciudad, ['route' => ['admin.ciudades.update', $ciudad->id], 'method' => 'patch']) !!}

                @include('modulos.sistema.ciudades.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
