@extends('layout.app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('modulos.common.errors')

            {!! Form::open(['route' => 'admin.sectores.store']) !!}

                @include('modulos.sistema.sectores.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
