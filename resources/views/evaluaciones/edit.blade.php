@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($evaluaciones, ['route' => ['evaluaciones.update', $evaluaciones->id], 'method' => 'patch']) !!}

        @include('evaluaciones.fields')

    {!! Form::close() !!}
</div>
@endsection
