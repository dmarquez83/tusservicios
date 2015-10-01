@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'servicios.store']) !!}

        @include('servicios.fields')

    {!! Form::close() !!}
</div>
@endsection
