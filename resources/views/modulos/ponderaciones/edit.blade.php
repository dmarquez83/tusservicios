@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($ponderacion, ['route' => ['admin.ponderaciones.update', $ponderacion->id], 'method' => 'patch']) !!}

        @include('modulos.ponderaciones.fields')

    {!! Form::close() !!}
</div>
@endsection
