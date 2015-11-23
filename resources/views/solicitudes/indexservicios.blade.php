@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">

            @include('solicitudes.tableservicios')

        </div>

    {{-- @include('common.paginate', ['records' => $servicios])--}}



 </div>
@endsection