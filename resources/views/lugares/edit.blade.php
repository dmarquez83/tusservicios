@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($lugares, ['route' => ['lugares.update', $lugares->id], 'method' => 'patch']) !!}

        @include('lugares.fields')

    {!! Form::close() !!}
</div>
@endsection
