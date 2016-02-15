@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('insumosFotos.create') !!}">Agregar Insumos</a>
        </div>
        <div class="row">
            @if($insumosFotos->isEmpty())
                <div class="well text-center">No InsumosFotos found.</div>
            @else
                @include('modulos.insumosFotos.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $insumosFotos])


    </div>
@endsection