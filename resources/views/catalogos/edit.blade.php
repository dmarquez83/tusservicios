@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($catalogos, ['route' => ['catalogos.update', $catalogos->id], 'method' => 'patch']) !!}

        @include('catalogos.fields')

    {!! Form::close() !!}
</div>
@endsection
