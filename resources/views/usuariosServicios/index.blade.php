@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="pull-left">Tus Servicios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('usuario.servicios.create') !!}">Nuevo</a>
        </div>

        <div class="row">
            @include('usuariosServicios.table')
        </div>




    </div>
@endsection