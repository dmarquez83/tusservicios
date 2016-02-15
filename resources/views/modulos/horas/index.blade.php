@extends('layout.app')

@section('content')

    <div>

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.horas.create') !!}">Crear Hora</a>
        </div>

        <div class="row">
            @if($horas->isEmpty())
                <div class="well text-center">No Horas found.</div>
            @else
                @include('modulos.horas.table')
            @endif
        </div>




    </div>
@endsection