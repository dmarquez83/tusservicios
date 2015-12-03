@extends('app')

@section('content')
<div>

    @include('common.errors')

    {!! Form::model($proveedores, ['route' => ['admin.proveedores.update', $proveedores->id], 'method' => 'patch']) !!}
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Editar Proveedor</h3>
            </div>
            @include('proveedores.fields')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
