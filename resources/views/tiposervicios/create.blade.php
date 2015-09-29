@extends('app')

@section('content')
<div class="container">

    @include('common.errors')



    {!! Form::open(['route' => 'tiposervicios.store']) !!}


        @include('tiposervicios.fields')

    {!! Form::close() !!}
</div>
@endsection
