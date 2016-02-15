@extends('layout.app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('modulos.common.errors')

            {!! Form::open(['route' => 'admin.estatus.store']) !!}

                @include('modulos.estatus.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection