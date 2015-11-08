@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">

            @include('solicitudes.tableservicios')

        </div>

    {{-- @include('common.paginate', ['records' => $servicios])--}}



 </div>
@endsection