@extends('layout.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Lugares</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('lugares.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($lugares->isEmpty())
                <div class="well text-center">No Lugares found.</div>
            @else
                @include('modulos.sistema.lugares.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $lugares])


    </div>
@endsection