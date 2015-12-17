@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Listado de Solicitudes</h1>
        </div>

        <div class="row">
            @include('solicitudes.listado')
        </div>


    </div>
@endsection