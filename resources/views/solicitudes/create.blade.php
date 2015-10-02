@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'solicitudes.store']) !!}

        @include('solicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
