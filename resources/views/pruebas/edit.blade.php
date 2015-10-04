@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($prueba, ['route' => ['pruebas.update', $prueba->id], 'method' => 'patch']) !!}

        @include('pruebas.fields')

    {!! Form::close() !!}
</div>
@endsection
