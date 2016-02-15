@extends('layout.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">InsumosServicios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('insumosServicios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($insumosServicios->isEmpty())
                <div class="well text-center">No InsumosServicios found.</div>
            @else
                @include('modulos.insumosServicios.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $insumosServicios])


    </div>
@endsection