@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">

            @include('modulos.servicios.table')

        </div>

        @include('modulos.common.paginate', ['records' => $categorias])



    </div>
@endsection