@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Tipo de Servicios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tiposervicios.create') !!}">Nuevo</a>
        </div>

        <div class="row">

                @include('tiposervicios.table')

        </div>

        @include('common.paginate', ['records' => $tiposervicios])


    </div>
@endsection