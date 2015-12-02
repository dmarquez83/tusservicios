@extends('app')

@section('content')
<div>

    @include('common.errors')

    {!! Form::open(['route' => 'admin.proveedores.store']) !!}
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Crear Proveedor</h3>
            </div>
        @include('proveedores.fields')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
