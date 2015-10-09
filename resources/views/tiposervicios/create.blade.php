@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {{-- Form::model($categoria, ['route' => ['categorias.update', $categoria->id], 'method' => 'patch', 'files' => 'true']) --}}

    {!! Form::open(['route' => ['tiposervicios.storenew', 77], 'method' => 'POST', 'files' => 'true']) !!}

        @include('tiposervicios.fields')

    {!! Form::close() !!}
</div>
@endsection
