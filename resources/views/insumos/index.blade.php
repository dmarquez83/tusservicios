@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Insumos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('insumos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($insumos->isEmpty())
                <div class="well text-center">No Insumos found.</div>
            @else
                @include('insumos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $insumos])


    </div>
@endsection