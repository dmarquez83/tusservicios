@extends('layout.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">CatalogosInsumos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('catalogosInsumos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($catalogosInsumos->isEmpty())
                <div class="well text-center">No CatalogosInsumos found.</div>
            @else
                @include('modulos.catalogosInsumos.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $catalogosInsumos])


    </div>
@endsection