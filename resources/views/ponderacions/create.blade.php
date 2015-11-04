@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'ponderacions.store']) !!}

        @include('ponderacions.fields')

    {!! Form::close() !!}
</div>
@endsection