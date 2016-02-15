@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($insumosServicios, ['route' => ['insumosServicios.update', $insumosServicios->id], 'method' => 'patch']) !!}

        @include('modulos.insumosServicios.fields')

    {!! Form::close() !!}
</div>
@endsection
