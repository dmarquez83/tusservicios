@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'lugares.store']) !!}

        @include('lugares.fields')

    {!! Form::close() !!}
</div>
@endsection
