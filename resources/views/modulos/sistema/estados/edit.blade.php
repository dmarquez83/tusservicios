@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($estados, ['route' => ['estados.update', $estados->id], 'method' => 'patch']) !!}

        @include('modulos.sistema.estados.fields')

    {!! Form::close() !!}
</div>
@endsection
