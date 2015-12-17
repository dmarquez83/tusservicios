@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($insumosSolicitudes, ['route' => ['insumosSolicitudes.update', $insumosSolicitudes->id], 'method' => 'patch']) !!}

        @include('insumosSolicitudes.fields')

    {!! Form::close() !!}
</div>
@endsection
