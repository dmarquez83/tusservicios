@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'proveedoresInsumos.store']) !!}

        @include('modulos.proveedoresInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
