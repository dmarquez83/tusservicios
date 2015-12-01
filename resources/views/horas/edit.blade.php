@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($horas, ['route' => ['horas.update', $horas->id], 'method' => 'patch']) !!}

        @include('horas.fields')

    {!! Form::close() !!}
</div>
@endsection
