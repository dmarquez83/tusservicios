@extends('app')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('form.login.title') }}</h3>
                    </div>
                    {!! Form::open(['route' => 'auth/login', 'class' => 'form-horizontal']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputEmail3">{{ trans('form.label.email') }}</label>
                                <div class="col-sm-10">
                                    {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputEmail3">{{ trans('form.label.password') }}</label>
                                <div class="col-sm-10">
                                    {!! Form::password('password', ['class'=> 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label><input name="remember" type="checkbox">{{ trans('form.label.remember') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('auth.getSocialAuth','facebook') }}" class="btn btn-social-icon btn-facebook">
                                    <i class="fa fa-facebook"></i></a>

                                <a href="{{ route('auth.getSocialAuth','twitter') }}" class="btn btn-social-icon btn-twitter">
                                    <i class="fa fa-twitter"></i></a>

                                <a href="{{ route('auth.getSocialAuth','google') }}" class="btn btn-social-icon btn-google">
                                    <i class="fa fa-google-plus"></i></a>
                            </div>
                            <br>
                            <div class="box-footer">

                                {!! Form::submit(trans('form.login.submit'),['class' => 'btn btn-primary pull-right']) !!}
                                <a href="{{ url('password/email') }}" class="btn btn-primary">{{ trans('passwords.forgot') }}</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
        </div>
    </div>
            <div class="col-md-2">
            </div>
@endsection
