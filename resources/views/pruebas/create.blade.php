@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'pruebas.store']) !!}

        @include('pruebas.fields')

    {!! Form::close() !!}
</div>
@endsection
