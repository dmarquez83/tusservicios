@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Tipo_usuarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipoUsuarios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tipoUsuarios->isEmpty())
                <div class="well text-center">No Tipo_usuarios found.</div>
            @else
                @include('tipoUsuarios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $tipoUsuarios])


    </div>
@endsection