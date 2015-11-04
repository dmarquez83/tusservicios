@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($estatu, ['route' => ['estatus.update', $estatu->id], 'method' => 'patch']) !!}

        @include('estatus.fields')

    {!! Form::close() !!}
</div>
@endsection