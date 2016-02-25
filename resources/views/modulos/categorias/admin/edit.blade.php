@extends('layout.app')

@section('content')
    <div class="">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('modulos.common.errors')

                {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria->id], 'method' => 'patch', 'files' => 'true']) !!}

                @include('modulos.categorias.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
