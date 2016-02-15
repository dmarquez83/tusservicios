@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'insumosFotos.store']) !!}

        @include('modulos.insumosFotos.fields')

    {!! Form::close() !!}
</div>
@endsection
