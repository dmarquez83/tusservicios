@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'insumosSolicitudes.store']) !!}

        @include('modulos.insumosSolicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
