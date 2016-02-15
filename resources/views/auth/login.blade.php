@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('form.login.title') }}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <h4 class="text-center text-black">Datos de Acceso</h4>
                            {!! Form::open(['route' => 'auth/login', 'class' => 'form-horizontal']) !!}
                            <div class="margin-bottom">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    {!! Form::email('email', '', ['class'=> 'form-control', 'placeholder' => "Email" ]) !!}
                                </div>
                            </div>
                            <div class="margin-bottom">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    {!! Form::password('password', ['class'=> 'form-control', 'placeholder' => "Clave"]) !!}
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn bg-blue-active">
                                    <i class="fa fa-sign-in"></i> Acceder
                                </button>
                            </div>
                            {!! Form::close() !!}
                            <a href="{{ url('password/email') }}" class="btn btn-sm text-orange">
                                {{ trans('passwords.forgot') }}
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <h4 class="text-center text-black">Acceso por Redes</h4>
                            <div class="margin-bottom">
                                <a href="{{ route('auth.getSocialAuth','facebook') }}"
                                   class="btn btn-social btn-facebook">
                                    <i class="fa fa-facebook"></i> Acceder con Facebook
                                </a>
                            </div>
                            <div class="margin-bottom">
                                <a href="{{ route('auth.getSocialAuth','twitter') }}"
                                   class="btn btn-social btn-twitter">
                                    <i class="fa fa-twitter"></i> Acceder con Twitter
                                </a>
                            </div>
                            <div class="margin-bottom">
                                <a href="{{ route('auth.getSocialAuth','google') }}"
                                   class="btn btn-social btn-google">
                                    <i class="fa fa-google-plus"></i> Acceder con Google Plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
