@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tipoUsuarios, ['route' => ['tipoUsuarios.update', $tipoUsuarios->id], 'method' => 'patch']) !!}

        @include('tipoUsuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
