@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('estatus.create') !!}"><i class="glyphicon glyphicon-plus"></i></a>
            </div>
        </div>

        <div class="row">
            @if($estatus->isEmpty())
                <div class="well text-center">No Estatus found.</div>
            @else
                @include('estatus.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $estatus])


    </div>
@endsection