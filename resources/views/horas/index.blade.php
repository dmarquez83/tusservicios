@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Horas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('horas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($horas->isEmpty())
                <div class="well text-center">No Horas found.</div>
            @else
                @include('horas.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $horas])


    </div>
@endsection