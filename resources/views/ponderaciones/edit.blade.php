@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($ponderacion, ['route' => ['admin.ponderaciones.update', $ponderacion->id], 'method' => 'patch']) !!}

        @include('ponderaciones.fields')

    {!! Form::close() !!}
</div>
@endsection
