@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($catalogosInsumos, ['route' => ['catalogosInsumos.update', $catalogosInsumos->id], 'method' => 'patch']) !!}

        @include('modulos.catalogosInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
