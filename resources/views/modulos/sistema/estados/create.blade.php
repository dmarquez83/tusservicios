@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'estados.store']) !!}

        @include('modulos.sistema.estados.fields')

    {!! Form::close() !!}
</div>
@endsection
