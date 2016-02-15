@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($municipios, ['route' => ['municipios.update', $municipios->id], 'method' => 'patch']) !!}

        @include('modulos.sistema.municipios.fields')

    {!! Form::close() !!}
</div>
@endsection
