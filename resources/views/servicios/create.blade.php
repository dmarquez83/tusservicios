@extends('app')

@section('content')
    <div class="container">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('common.errors')

                {!! Form::open(['route' => 'categorias.servicios.store', 'method' => 'POST', 'files' => 'true']) !!}


                @include('servicios.fields')

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection