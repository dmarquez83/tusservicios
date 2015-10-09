@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($fernando, ['route' => ['fernandos.update', $fernando->id], 'method' => 'patch']) !!}

        @include('fernandos.fields')

    {!! Form::close() !!}
</div>
@endsection
