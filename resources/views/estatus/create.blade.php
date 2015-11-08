@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'estatus.store']) !!}

        @include('estatus.fields')

    {!! Form::close() !!}
</div>
@endsection
