@extends('layout.app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="pull-left">Horarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('horarios.create') !!}">Crear Horario</a>
        </div>

        <div class="row">
            @if($horarios->isEmpty())
                <div class="well text-center">No Horarios found.</div>
            @else
                @include('modulos.horarios.table')
            @endif
        </div>

        @include('modulos.common.paginate', ['records' => $horarios])


    </div>
@endsection