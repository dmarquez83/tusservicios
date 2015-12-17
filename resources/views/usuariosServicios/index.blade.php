@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">UsuariosServicios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('usuario.servicios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($usuariosServicios->isEmpty())
                <div class="well text-center">No UsuariosServicios found.</div>
            @else
                @include('usuariosServicios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $usuariosServicios])


    </div>
@endsection