@extends('app')

@section('content')
<div>
    <div class="row margin-top_small">
        <div class="col s12 m6 ">

            @include('common.errors')

            {!! Form::model($estatu, ['route' => ['estatus.update', $estatu->id], 'method' => 'patch']) !!}

                @include('estatus.fields')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
