@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header">
                        <h4 class="box-title">{{ trans('form.signup.title') }}</h4>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center text-black">Registro de Usuario</h4>
                                {!! Form::open(['route' => 'registro', 'class' => 'form']) !!}

                                <div class="margin-bottom">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {!! Form::input('text', 'name', null, ['class'=> 'form-control','placeholder' => "Nombre"]) !!}
                                    </div>
                                </div>

                                <div class="margin-bottom">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        {!! Form::input('email', 'email', null, ['class'=> 'form-control','placeholder' => "Correo"]) !!}
                                    </div>
                                </div>
                                <div class="margin-bottom">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        {!! Form::password('password', ['class'=> 'form-control','placeholder' => "Contraseña"]) !!}
                                    </div>
                                </div>

                                <div class="margin-bottom">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                                        {!! Form::password('password_confirmation', ['class'=> 'form-control','placeholder' => "Confirmar Contraseña"]) !!}
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button class="btn bg-blue-active">
                                        <i class="fa fa-user"></i> Registrar
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <h4 class="text-center text-black">Acceso por Redes</h4>
                                <div class="margin-bottom">
                                    <a href="{{ route('auth.getSocialAuth','facebook') }}"
                                       class="btn btn-social btn-block btn-facebook">
                                        <i class="fa fa-facebook"></i> Acceder con Facebook
                                    </a>
                                </div>
                                <div class="margin-bottom">
                                    <a href="{{ route('auth.getSocialAuth','twitter') }}"
                                       class="btn btn-social btn-block btn-twitter">
                                        <i class="fa fa-twitter"></i> Acceder con Twitter
                                    </a>
                                </div>
                                <div class="margin-bottom">
                                    <a href="{{ route('auth.getSocialAuth','google') }}"
                                       class="btn btn-social btn-block btn-google">
                                        <i class="fa fa-google-plus"></i> Acceder con Google Plus
                                    </a>
                                </div>
                                <div class="margin-bottom">
                                    <a href="{{ route('auth.getSocialAuth','linkedin') }}"
                                       class="btn btn-social btn-block btn-linkedin">
                                        <i class="fa fa-linkedin"></i> Acceder con Linkedin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
