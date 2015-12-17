@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($municipios, ['route' => ['municipios.update', $municipios->id], 'method' => 'patch']) !!}

        @include('municipios.fields')

    {!! Form::close() !!}
</div>
@endsection
