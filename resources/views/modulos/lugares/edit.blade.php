@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($lugares, ['route' => ['lugares.update', $lugares->id], 'method' => 'patch']) !!}

        @include('modulos.lugares.fields')

    {!! Form::close() !!}
</div>
@endsection
