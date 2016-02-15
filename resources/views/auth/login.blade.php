@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('form.login.title') }}</h3>
                </div>
                {!! Form::open(['route' => 'auth/login', 'class' => 'form-horizontal']) !!}
                @include('app.partials.login')
                <div class="box-footer">
                    {!! Form::submit(trans('form.login.submit'),['class' => 'btn btn-primary']) !!}
                    <a href="{{ url('password/email') }}" class="btn btn-primary">{{ trans('passwords.forgot') }}</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
