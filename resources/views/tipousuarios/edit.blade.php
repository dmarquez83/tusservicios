@extends('app')

@section('content')
    <div class="">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('common.errors')

                {!! Form::model($tipousuarios, ['route' => ['admin.tipousuarios.update', $tipousuarios->id], 'method' => 'patch']) !!}

                    @include('tipousuarios.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
