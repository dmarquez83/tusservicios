@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'insumosServicios.store']) !!}

        @include('modulos.insumosServicios.fields')

    {!! Form::close() !!}
</div>
@endsection
