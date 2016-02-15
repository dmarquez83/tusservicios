@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Categorías</h1>
        </div>
        @include('flash::message')
        @include('modulos.solicitudes.buscar')
        <div class="row">
            @include('modulos.solicitudes.table')
        </div>
    </div>
@endsection
