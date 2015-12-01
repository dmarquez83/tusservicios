@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Proveedores</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.proveedores.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($proveedores->isEmpty())
                <div class="well text-center">No Proveedores found.</div>
            @else
                @include('proveedores.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $proveedores])


    </div>
@endsection