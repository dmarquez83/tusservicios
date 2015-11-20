@extends('app')

@section('content')
<div class="">
    <div class="row margin-top_small">
        <div class="col s12 m6 ">
            @include('common.errors')
            {{-- var_dump($servicios) ESTO MUESTRA LA VARIABLE --}}
            {!! Form::model($servicios[0], ['route' => ['categorias.servicios.update', $servicios[0]->id], 'method' => 'patch', 'files' => 'true']) !!}

            @include('servicios.fields_edit')

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection