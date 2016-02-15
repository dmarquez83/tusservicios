@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($insumosFoto, ['route' => ['insumosFotos.update', $insumosFoto->id], 'method' => 'patch']) !!}

        @include('modulos.insumosFotos.fields')

    {!! Form::close() !!}
</div>
@endsection
