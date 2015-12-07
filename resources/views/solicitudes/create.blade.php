@extends('app')

@section('content')
<div class="">
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')


                {!! Form::open(['route' => ['solicitudes.store', $servicios], 'method' => 'GET', 'files' => 'true']) !!}

            @include('solicitudes.fields')

                {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts-modulo')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script('admin/js/insumos.js') !!}
@endsection
