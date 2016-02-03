<header class="main-header">
    <!-- Logo -->
    <a class="logo" href="#">
        <span class="logo-mini">
            {!! Html::image('assets/img/tusservicios-logo-min.jpg', 'logo', array('class' => '')) !!}
        </span>
        <span class="logo-lg">
            {!! Html::image('assets/img/logo.png', 'logo', array('class' => '')) !!}
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="" data-toggle="offcanvas" role="button">
            <!--<span class="glyphicon glyphicon-menu-hamburger"></span>-->
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            @if(Auth::check())
                <li class="dropdown messages-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                </li>
                <li class="dropdown notifications-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#">
                        <i class="glyphicon glyphicon-user"></i>
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="{{ route('auth/logout') }}"><i class="glyphicon glyphicon-off"></i></a>
                </li>
            @else
                <li class="dropdown messages-menu">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="glyphicon glyphicon-user"></i>
                        <i class="glyphicon glyphicon-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu" style="width: 100px">
                        <li>
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a data-toggle="modal" data-target="#inici_sesion">
                                        Inicio Sesion
                                    </a>
                                </li>
                                <li><!-- start message -->
                                    <a data-toggle="modal" data-target="#registro">
                                        Registrarse
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif
            </ul>
        </div>
    </nav>
</header>

<!-- Modal inicio sesion -->
{!! Form::open(['route' => 'auth/login', 'class' => 'form-horizontal']) !!}
<div class="modal fade" id="inici_sesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Inicio de Sesion</h4>
            </div>
            <div class="modal-body">
                @include('partials.layout.login')
            </div>
            <div class="modal-footer">
                {!! Form::submit(trans('form.login.submit'),['class' => 'btn btn-primary']) !!}
                <a href="{{ url('password/email') }}" class="btn btn-primary">{{ trans('passwords.forgot') }}</a>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<!-- Modal Registro -->
{!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}
<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Re5gistro de Usuario</h4>
            </div>
            <div class="modal-body">
                @include('partials.layout.registro')
            </div>
            <div class="modal-footer">
                {!! Form::submit(trans('form.signup.submit'),['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}