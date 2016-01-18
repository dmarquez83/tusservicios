@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Tus Servicios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('usuario.servicios.create') !!}">Nuevo</a>
        </div>

        <div class="row">
            @include('usuariosServicios.table')
        </div>




    </div>
@endsection