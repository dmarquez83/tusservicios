@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($catalogos, ['route' => ['catalogos.update', $catalogos->id], 'method' => 'patch']) !!}

        @include('modulos.catalogos.fields')

    {!! Form::close() !!}
</div>
@endsection
