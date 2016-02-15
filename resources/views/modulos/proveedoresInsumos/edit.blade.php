@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($proveedoresInsumos, ['route' => ['proveedoresInsumos.update', $proveedoresInsumos->id], 'method' => 'patch']) !!}

        @include('modulos.proveedoresInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
