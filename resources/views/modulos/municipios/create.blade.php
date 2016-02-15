@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'municipios.store']) !!}

        @include('modulos.municipios.fields')

    {!! Form::close() !!}
</div>
@endsection
