@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'proveedoresInsumos.store']) !!}

        @include('proveedoresInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
