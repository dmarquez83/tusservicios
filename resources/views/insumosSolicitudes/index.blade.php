@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">InsumosSolicitudes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('insumosSolicitudes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($insumosSolicitudes->isEmpty())
                <div class="well text-center">No InsumosSolicitudes found.</div>
            @else
                @include('insumosSolicitudes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $insumosSolicitudes])


    </div>
@endsection