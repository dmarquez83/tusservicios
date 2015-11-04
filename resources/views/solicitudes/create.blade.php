@extends('app')

@section('content')
<div class="container">

    @include('common.errors')


    {!! Form::open(['route' => ['solicitudes.store', $servicios], 'method' => 'GET', 'files' => 'true']) !!}

        @include('solicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
