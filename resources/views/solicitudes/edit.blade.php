@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($solicitudes, ['route' => ['solicitudes.update', $solicitudes->id], 'method' => 'patch']) !!}

        @include('solicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
