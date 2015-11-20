@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

          @include('servicios.buscar')

        <div class="row">
          @if($servicios->isEmpty())
              <div class="well text-center">No Hay Servicios Cargados.</div>
          @else
              @include('servicios.tableservicios')
          @endif
        </div>
        {{--   @include('common.paginate', ['records' => $servicios]) --}}
    </div>

 @endsection