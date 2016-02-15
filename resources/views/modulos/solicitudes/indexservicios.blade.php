@extends('layout.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="row">
            @include('modulos.solicitudes.tableservicios')
        </div>
    </div>
@endsection