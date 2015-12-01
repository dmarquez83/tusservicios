@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'dias.store']) !!}

        @include('dias.fields')

    {!! Form::close() !!}
</div>
@endsection
