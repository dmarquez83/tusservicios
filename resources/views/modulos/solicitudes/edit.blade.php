@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($solicitudes, ['route' => ['solicitudes.update', $solicitudes->id], 'method' => 'patch']) !!}

        @include('modulos.solicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
