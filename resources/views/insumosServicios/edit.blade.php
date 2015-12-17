@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($insumosServicios, ['route' => ['insumosServicios.update', $insumosServicios->id], 'method' => 'patch']) !!}

        @include('insumosServicios.fields')

    {!! Form::close() !!}
</div>
@endsection
