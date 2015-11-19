@extends('app')

@section('content')
<div class="">
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')

            {!! Form::model($categoria, ['route' => ['categorias.update', $categoria->id], 'method' => 'patch', 'files' => 'true']) !!}

            @include('categorias.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
