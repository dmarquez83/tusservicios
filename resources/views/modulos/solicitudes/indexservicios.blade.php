@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">

            @include('modulos.solicitudes.tableservicios')

        </div>

    {{-- @include('common.paginate', ['records' => $servicios])--}}
 </div>
@endsection