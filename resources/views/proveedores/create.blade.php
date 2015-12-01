@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.proveedores.store']) !!}

        @include('proveedores.fields')

    {!! Form::close() !!}
</div>
@endsection
