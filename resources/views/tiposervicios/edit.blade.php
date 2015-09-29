@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tiposervicio, ['route' => ['tiposervicios.update', $tiposervicio->id], 'method' => 'patch']) !!}

        @include('tiposervicios.fields')

    {!! Form::close() !!}
</div>
@endsection
