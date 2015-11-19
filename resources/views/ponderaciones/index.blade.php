@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Ponderaciones</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ponderaciones.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($ponderaciones->isEmpty())
                <div class="well text-center">No hay Ponderaciones</div>
            @else
                @include('ponderaciones.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $ponderaciones])


    </div>
@endsection