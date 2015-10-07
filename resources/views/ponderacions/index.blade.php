@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Ponderacions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ponderacions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($ponderacions->isEmpty())
                <div class="well text-center">No Ponderacions found.</div>
            @else
                @include('ponderacions.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $ponderacions])


    </div>
@endsection