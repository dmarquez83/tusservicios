@extends('app')

@section('content')

    <div class="">

        @include('flash::message')
        @include('solicitudes.buscar')

        <div class="row">

            @include('solicitudes.table')

        </div>

    {{-- @include('common.paginate', ['records' => $categorias]) --}}

</div>
@endsection