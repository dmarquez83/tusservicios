@extends('layout.app')

@section('content')
    <div>
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('modulos.common.errors')

                {!! Form::open(['route' => 'admin.categorias.store', 'method' => 'POST', 'files' => 'true']) !!}

                @include('modulos.categorias.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts-modulo')


@endsection

