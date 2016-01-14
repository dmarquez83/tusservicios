@extends('app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')
            {!! Form::model($tiposervicio, ['route' => ['tiposervicios.update', $tiposervicio->id], 'method' => 'patch']) !!}
                @include('tiposervicios.fields_edit')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
