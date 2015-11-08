@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'categorias.store', 'method' => 'POST', 'files' => 'true']) !!}

        @include('categorias.fields')

    {!! Form::close() !!}
</div>
@endsection
