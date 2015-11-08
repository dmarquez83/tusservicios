@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'insumos.store']) !!}

        @include('insumos.fields')

    {!! Form::close() !!}
</div>
@endsection
