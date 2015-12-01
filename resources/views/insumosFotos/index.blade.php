@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">InsumosFotos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('insumosFotos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($insumosFotos->isEmpty())
                <div class="well text-center">No InsumosFotos found.</div>
            @else
                @include('insumosFotos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $insumosFotos])


    </div>
@endsection