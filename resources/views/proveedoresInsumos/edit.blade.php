@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($proveedoresInsumos, ['route' => ['proveedoresInsumos.update', $proveedoresInsumos->id], 'method' => 'patch']) !!}

        @include('proveedoresInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
