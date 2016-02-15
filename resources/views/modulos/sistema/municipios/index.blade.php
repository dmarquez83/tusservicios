@extends('layout.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Municipios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('municipios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($municipios->isEmpty())
                <div class="well text-center">No Municipios found.</div>
            @else
                @include('modulos.sistema.municipios.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $municipios])


    </div>
@endsection