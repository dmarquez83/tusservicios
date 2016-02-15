@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($insumosSolicitudes, ['route' => ['insumosSolicitudes.update', $insumosSolicitudes->id], 'method' => 'patch']) !!}

        @include('modulos.insumosSolicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
