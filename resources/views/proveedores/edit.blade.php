@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($proveedores, ['route' => ['admin.proveedores.update', $proveedores->id], 'method' => 'patch']) !!}

        @include('proveedores.fields')

    {!! Form::close() !!}
</div>
@endsection
