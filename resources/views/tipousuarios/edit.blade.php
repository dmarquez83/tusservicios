@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tipousuarios, ['route' => ['tipousuarios.update', $tipousuarios->id], 'method' => 'patch']) !!}

        @include('tipousuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
