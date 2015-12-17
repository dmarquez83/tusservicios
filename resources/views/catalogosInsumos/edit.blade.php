@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($catalogosInsumos, ['route' => ['catalogosInsumos.update', $catalogosInsumos->id], 'method' => 'patch']) !!}

        @include('catalogosInsumos.fields')

    {!! Form::close() !!}
</div>
@endsection
