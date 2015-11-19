@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">

            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('categorias.servicios.index') !!}">Nuevo</a>

        </div>

          @include('servicios.buscar')

          @if($servicios->isEmpty())
              <div class="well text-center">No Hay Servicios Cargados.</div>
          @else
              @include('servicios.tableservicios')
          @endif



        {{--   @include('common.paginate', ['records' => $servicios]) --}}



    </div>

 @endsection