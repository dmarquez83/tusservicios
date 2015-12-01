@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($dias, ['route' => ['dias.update', $dias->id], 'method' => 'patch']) !!}

        @include('dias.fields')

    {!! Form::close() !!}
</div>
@endsection
