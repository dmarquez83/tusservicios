@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($usuariosServicios, ['route' => ['user.servicios.update', $usuariosServicios->id], 'method' => 'patch']) !!}

        @include('modulos.usuariosServicios.fields_edit')

    {!! Form::close() !!}
</div>
@endsection
@section('scripts-modulo')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script('assets/js/app/categorias-servicios.js') !!}

@endsection