@extends('app')

@section('content')

    <div class="">

        @include('flash::message')
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="pull-left">Insumos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('insumos.create') !!}">Agregar Insumo</a>
        </div>
        <div class="row">
            @if($insumos->isEmpty())
                <div class="well text-center">Insumos no encontrada.</div>
            @else
                @include('insumos.table')
            @endif
        </div>



    </div>
@endsection

