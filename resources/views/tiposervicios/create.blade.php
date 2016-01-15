@extends('app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            {{--@include('common.errors')
            {{--   {!! Form::model($categoria, ['route' => ['tiposervicios.storenew', 77], 'method' => 'POST', 'files' => 'true']) !!} --}}
            {!! Form::open(['route' => ['tiposervicios.storenew', $categoria], 'method' => 'POST', 'files' => 'true']) !!}
                @include('tiposervicios.fields')
            {!! Form::close() !!}
        </div>
  </div>
</div>
@endsection
