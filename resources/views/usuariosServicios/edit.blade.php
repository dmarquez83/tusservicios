@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($usuariosServicios, ['route' => ['usuario.servicios.update', $usuariosServicios->id], 'method' => 'patch']) !!}

        @include('usuariosServicios.fields_edit')

    {!! Form::close() !!}
</div>
@endsection
@section('scripts-modulo')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script('admin/js/categorias-servicios.js') !!}

@endsection