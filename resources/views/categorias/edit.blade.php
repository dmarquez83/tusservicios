@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria->id], 'method' => 'patch', 'files' => 'true']) !!}

        @include('categorias.fields_edit')

    {!! Form::close() !!}
</div>
@endsection
