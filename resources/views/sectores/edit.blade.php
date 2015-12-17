@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($sector, ['route' => ['admin.sectores.update', $sector->id], 'method' => 'patch']) !!}

        @include('sectors.fields')

    {!! Form::close() !!}
</div>
@endsection
