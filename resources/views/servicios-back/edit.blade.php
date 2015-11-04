@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($servicios, ['route' => ['servicios.update', $servicios->id], 'method' => 'patch', 'files' => 'true']) !!}

        @include('servicios.fields')

    {!! Form::close() !!}
</div>
@endsection