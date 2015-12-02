@extends('app')

@section('content')

    <div class="">

            @include('flash::message')
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('admin.categorias.create') !!}">Agregar Categorias</a>
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

