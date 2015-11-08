@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($insumo, ['route' => ['insumos.update', $insumo->id], 'method' => 'patch']) !!}

        @include('insumos.fields')

    {!! Form::close() !!}
</div>
@endsection
