@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">

            @include('servicios.table')

        </div>

        @include('common.paginate', ['records' => $categorias])



    </div>
@endsection