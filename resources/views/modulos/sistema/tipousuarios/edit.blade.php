@extends('layout.app')

@section('content')
    <div class="">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('modulos.common.errors')

                {!! Form::model($tipousuarios, ['route' => ['admin.tipousuarios.update', $tipousuarios->id], 'method' => 'patch']) !!}

                    @include('modulos.sistema.tipousuarios.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
