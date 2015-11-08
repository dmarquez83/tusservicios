@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tipousuarios.store']) !!}

        @include('tipousuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
