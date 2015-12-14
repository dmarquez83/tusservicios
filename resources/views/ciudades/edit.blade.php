@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($ciudad, ['route' => ['admin.ciudades.update', $ciudad->id], 'method' => 'patch']) !!}

        @include('ciudades.fields')

    {!! Form::close() !!}
</div>
@endsection
