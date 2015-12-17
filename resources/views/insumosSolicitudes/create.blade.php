@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'insumosSolicitudes.store']) !!}

        @include('insumosSolicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
