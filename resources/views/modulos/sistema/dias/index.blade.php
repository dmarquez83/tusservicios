@extends('layout.app')

@section('content')

    <div>

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.dias.create') !!}">Crear Dia</a>
        </div>

        <div class="row">
            @if($dias->isEmpty())
                <div class="well text-center">No Dias found.</div>
            @else
                @include('modulos.sistema.dias.table')
            @endif
        </div>


    </div>
@endsection