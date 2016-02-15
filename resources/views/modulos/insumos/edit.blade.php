@extends('layout.app')

@section('content')
    <div class="">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('modulos.common.errors')

                {!! Form::model($insumos, ['route' => ['admin.insumos.update', $insumos->id], 'method' => 'patch', 'files' => 'true']) !!}

                @include('modulos.insumos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
