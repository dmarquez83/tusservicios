@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($ponderacion, ['route' => ['ponderacions.update', $ponderacion->id], 'method' => 'patch']) !!}

        @include('ponderacions.fields')

    {!! Form::close() !!}
</div>
@endsection
