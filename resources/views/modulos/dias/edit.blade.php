@extends('layout.app')

@section('content')
<div class="container">

    @include('modulos.common.errors')

    {!! Form::model($dias, ['route' => ['admin.dias.update', $dias->id], 'method' => 'patch']) !!}
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Editar Dia</h3>
            </div>
            @include('modulos.dias.fields')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
