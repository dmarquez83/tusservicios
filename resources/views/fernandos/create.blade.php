@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'fernandos.store']) !!}

        @include('fernandos.fields')

    {!! Form::close() !!}
</div>
@endsection
