@extends('layout.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Estados</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('estados.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($estados->isEmpty())
                <div class="well text-center">No Estados found.</div>
            @else
                @include('modulos.estados.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $estados])


    </div>
@endsection