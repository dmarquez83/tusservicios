@extends('layout.app')

@section('content')
        {!! Form::open(['route' => 'admin.categorias.store', 'method' => 'POST', 'files' => 'true']) !!}
        @include('modulos.categorias.admin.fields')
        {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('assets/plugins/fileinput/js/fileinput.min.js') !!}
    {!! Html::script('assets/plugins/fileinput/js/fileinput_locale_es.js') !!}
    {!! Html::script('assets/js/admin/categorias_create.js') !!}
@endsection


@section('styles')
    {!! Html::style('assets/plugins/fileinput/css/fileinput.min.css') !!}
@endsection
