@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Tiposervicios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tiposervicios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tiposervicios->isEmpty())
                <div class="well text-center">No Tiposervicios found.</div>
            @else
                @include('tiposervicios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $tiposervicios])


    </div>
@endsection