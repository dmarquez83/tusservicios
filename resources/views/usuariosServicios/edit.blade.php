@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($usuariosServicios, ['route' => ['usuario.servicios.update', $usuariosServicios->id], 'method' => 'patch']) !!}

        @include('usuariosServicios.fields')

    {!! Form::close() !!}
</div>
@endsection
