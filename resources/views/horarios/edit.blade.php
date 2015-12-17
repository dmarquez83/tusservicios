@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($horarios, ['route' => ['horarios.update', $horarios->id], 'method' => 'patch']) !!}
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Crear Horarios</h3>
            </div>
            @include('horarios.fields')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
