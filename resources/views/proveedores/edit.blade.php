@extends('app')

@section('content')
<div>

    @include('common.errors')

    {!! Form::model($proveedores, ['route' => ['admin.proveedores.update', $proveedores->id], 'method' => 'patch']) !!}
    <h2 class="page-header">Editar Proveedor</h2>
            @include('proveedores.fields')
    {!! Form::close() !!}
</div>
@endsection
