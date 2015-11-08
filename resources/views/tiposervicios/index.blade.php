@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

          <div class="row">

                @include('tiposervicios.table')

        </div>

        @include('common.paginate', ['records' => $categorias])



    </div>
@endsection