@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'catalogosInsumos.store']) !!}

        @include('catalogosInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
