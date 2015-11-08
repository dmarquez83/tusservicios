@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'evaluaciones.store']) !!}

        @include('evaluaciones.fields')

    {!! Form::close() !!}
</div>
@endsection
