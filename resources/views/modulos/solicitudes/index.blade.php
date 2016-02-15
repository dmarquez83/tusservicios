@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')
        @include('modulos.solicitudes.buscar')

        <div class="row">

            @include('modulos.solicitudes.table')

        </div>

    {{-- @include('common.paginate', ['records' => $categorias]) --}}

</div>
@endsection
