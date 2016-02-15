@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'user.servicios.store']) !!}

        @include('modulos.usuariosServicios.fields')

    {!! Form::close() !!}
</div>
@endsection
@section('scripts-modulo')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script('admin/js/categorias-servicios.js') !!}

@endsection