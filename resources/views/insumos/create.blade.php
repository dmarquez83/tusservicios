@extends('app')

@section('content')
    <div class="">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('common.errors')

                {!! Form::open(['route' => 'insumos.store', 'method' => 'POST', 'files' => 'true']) !!}

                @include('insumos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
