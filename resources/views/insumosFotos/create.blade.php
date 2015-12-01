@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'insumosFotos.store']) !!}

        @include('insumosFotos.fields')

    {!! Form::close() !!}
</div>
@endsection
