@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ProveedoresInsumos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('proveedoresInsumos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($proveedoresInsumos->isEmpty())
                <div class="well text-center">No ProveedoresInsumos found.</div>
            @else
                @include('proveedoresInsumos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $proveedoresInsumos])


    </div>
@endsection