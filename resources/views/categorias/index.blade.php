@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')



        <div class="row">
            @if($categorias->isEmpty())
                <div class="well text-center">Categoria no encontrada.</div>
            @else
                @include('categorias.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $categorias])


    </div>
@endsection

