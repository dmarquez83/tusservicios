@extends('layout.app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            {{--@include('common.errors')
            {{--   {!! Form::model($categoria, ['route' => ['tiposervicios.storenew', 77], 'method' => 'POST', 'files' => 'true']) !!} --}}
            {!! Form::open(['route' => ['admin.tiposervicios.store', $categorias], 'method' => 'POST', 'files' => 'true']) !!}
                @include('modulos.tiposervicios.fields')
            {!! Form::close() !!}
        </div>
  </div>
</div>
@endsection
