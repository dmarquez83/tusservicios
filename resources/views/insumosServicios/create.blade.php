@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'insumosServicios.store']) !!}

        @include('insumosServicios.fields')

    {!! Form::close() !!}
</div>
@endsection
