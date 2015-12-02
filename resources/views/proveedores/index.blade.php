@extends('app')

@section('content')

    <div>

        @include('flash::message')
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="btn btn-primary pull-right btn-sm" style="margin-top: 25px" href="{!! route('admin.proveedores.create') !!}">Agregar Proveedor</a>
        </div>

        <div class="row">
            @if($proveedores->isEmpty())
                <div class="well text-center">No Proveedores found.</div>
            @else
                @include('proveedores.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $proveedores])


    </div>
@endsection