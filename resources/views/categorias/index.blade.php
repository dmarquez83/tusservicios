@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Categorias</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.categorias.create') !!}">Agregar</a>
        </div>

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

