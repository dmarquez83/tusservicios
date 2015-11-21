@extends('app')

@section('content')
    <div class="">
        <div class="row margin-top_small">
            <div class="col s12 m6 ">
                @include('common.errors')

                {!! Form::model($insumos, ['route' => ['insumos.update', $insumos->id], 'method' => 'patch', 'files' => 'true']) !!}

                @include('insumos.fields_edit')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
