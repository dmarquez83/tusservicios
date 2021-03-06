@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="pull-left">Servicios</h1>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                </div>
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Encuentra el Servicio que necesitas">
            </div>
        </div>

        <div class="row">

            @include('servicios.listar')

        </div>

        {{-- @include('common.paginate', ['records' => $categorias]) --}}

    </div>
@endsection