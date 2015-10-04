@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Pruebas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('pruebas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($pruebas->isEmpty())
                <div class="well text-center">No Pruebas found.</div>
            @else
                @include('pruebas.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $pruebas])


    </div>
@endsection