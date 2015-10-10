@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {{--   {!! Form::model($categoria, ['route' => ['tiposervicios.storenew', 77], 'method' => 'POST', 'files' => 'true']) !!} --}}

     {!! Form::open(['route' => ['tiposervicios.storenew', $categoria], 'method' => 'POST', 'files' => 'true']) !!}



      @include('tiposervicios.fields')

  {!! Form::close() !!}
</div>
@endsection
