@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Servicios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('servicios.create') !!}">Add New</a>
        </div>

        <div class="row">
    {{--  @if($servicios->isEmpty())
            <div class="well text-center">No Servicios found.</div>--}}
  {{--      @else --}}
            @include('servicios.table')
   {{--     @endif --}}
    </div>

    @include('common.paginate', ['records' => $servicios])


 </div>
 @endsection