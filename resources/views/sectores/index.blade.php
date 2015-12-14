@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Sectors</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.sectores.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($sectores->isEmpty())
                <div class="well text-center">No Sectors found.</div>
            @else
                @include('sectores.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $sectores])


    </div>
@endsection