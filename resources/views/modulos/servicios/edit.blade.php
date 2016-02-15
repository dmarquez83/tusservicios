@extends('layout.app')

@section('content')
<div class="">
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('modulos.common.errors')
            {{-- var_dump($servicios) ESTO MUESTRA LA VARIABLE --}}
            {!! Form::model($servicios[0], ['route' => ['categorias.servicios.update', $servicios[0]->id], 'method' => 'patch', 'files' => 'true']) !!}

            @include('modulos.servicios.fields_edit')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts-modulo')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {!! Html::script('admin/js/categorias.js') !!}

@endsection