@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Solicitudes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('solicitudes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($solicitudes->isEmpty())
                <div class="well text-center">No Solicitudes found.</div>
            @else
                @include('solicitudes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $solicitudes])


    </div>
@endsection