@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.dias.store']) !!}
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Crear Dia</h3>
            </div>
            @include('dias.fields')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
