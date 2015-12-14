@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.ciudades.store']) !!}

        @include('ciudades.fields')

    {!! Form::close() !!}
</div>
@endsection
