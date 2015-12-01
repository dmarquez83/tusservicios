@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Dias</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('dias.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($dias->isEmpty())
                <div class="well text-center">No Dias found.</div>
            @else
                @include('dias.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $dias])


    </div>
@endsection