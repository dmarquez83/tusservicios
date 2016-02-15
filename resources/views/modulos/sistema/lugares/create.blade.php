@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'lugares.store']) !!}

        @include('modulos.sistema.lugares.fields')

    {!! Form::close() !!}
</div>
@endsection
