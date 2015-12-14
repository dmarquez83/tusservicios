@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.sectores.store']) !!}

        @include('sectores.fields')

    {!! Form::close() !!}
</div>
@endsection
