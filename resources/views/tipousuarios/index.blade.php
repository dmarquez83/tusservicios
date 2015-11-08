@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Tipousuarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipousuarios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tipousuarios->isEmpty())
                <div class="well text-center">No Tipousuarios found.</div>
            @else
                @include('tipousuarios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $tipousuarios])


    </div>
@endsection