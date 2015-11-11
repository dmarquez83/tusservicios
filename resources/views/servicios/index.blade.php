@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Servicios</h1>
        </div>

        <div class="row">

            @include('servicios.table')

        </div>

        @include('common.paginate', ['records' => $categorias])



    </div>
@endsection