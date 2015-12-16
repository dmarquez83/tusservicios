@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'usuario.servicios.store']) !!}

        @include('usuariosServicios.fields')

    {!! Form::close() !!}
</div>
@endsection
