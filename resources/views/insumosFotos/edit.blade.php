@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($insumosFoto, ['route' => ['insumosFotos.update', $insumosFoto->id], 'method' => 'patch']) !!}

        @include('insumosFotos.fields')

    {!! Form::close() !!}
</div>
@endsection
