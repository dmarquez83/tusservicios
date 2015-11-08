@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Evaluaciones</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('evaluaciones.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($evaluaciones->isEmpty())
                <div class="well text-center">No Evaluaciones found.</div>
            @else
                @include('evaluaciones.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $evaluaciones])


    </div>
@endsection