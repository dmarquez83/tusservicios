@extends('app')

@section('content')

    <div class="">

        @include('flash::message')

        <div class="row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ponderacions.create') !!}"><i class="glyphicon glyphicon-plus"></i></a>
            </div>
        </div>

        <div class="row">
            @if($ponderacions->isEmpty())
                <div class="well text-center">No Ponderacions found.</div>
            @else
                @include('ponderacions.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $ponderacions])


    </div>
@endsection