@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::open(['route' => 'catalogosInsumos.store']) !!}

        @include('modulos.catalogosInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
