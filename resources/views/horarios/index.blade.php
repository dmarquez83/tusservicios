@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Horarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('horarios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($horarios->isEmpty())
                <div class="well text-center">No Horarios found.</div>
            @else
                @include('horarios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $horarios])


    </div>
@endsection