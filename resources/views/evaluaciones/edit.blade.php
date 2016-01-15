@extends('app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')

            {!! Form::model($evaluaciones, ['route' => ['evaluaciones.update', $evaluaciones->id], 'method' => 'patch']) !!}

                @include('evaluaciones.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
