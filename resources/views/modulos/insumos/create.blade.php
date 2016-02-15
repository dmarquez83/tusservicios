@extends('layout.app')

@section('content')
    <div class="">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('modulos.common.errors')

                {!! Form::open(['route' => 'admin.insumos.store', 'method' => 'POST', 'files' => 'true']) !!}

                @include('modulos.insumos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
