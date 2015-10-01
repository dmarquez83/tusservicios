@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Estatus</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('estatus.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($estatus->isEmpty())
                <div class="well text-center">No Estatus found.</div>
            @else
                @include('estatus.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $estatus])


    </div>
@endsection