                <!-- NAVIGATION -->
                <div class="l-navigation-wrap menu-padd" id="l-navigation">
                    <div class="m-navbar container">
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">

                                <div class="l-logo">
                                  <a href="#splash-image-wrap">
                                      {!! Html::image('assets/img/logo.png', 'logo', array('class' => '')) !!}

                                  </a>
                                </div><!-- l-logo -->



                              <!-- Brand and toggle get grouped for better mobile display -->
                              <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                </button>
                              </div>

                              <!-- Collect the nav links, forms, and other content for toggling -->
                              <div class="collapse navbar-collapse" id="navbar">

                                    <ul class="nav navbar-nav navbar-right">
                                      <li class="active">
                                       <a href="#page-section">Nosotros</a>
                                      </li>
                                        <!--<li><a href="#whatwedo">Que hacemos</a></li>-->
                                        <li><a href="#news">Categorías</a></li>
                                        <li><a href="#testimonials">Testimonios</a></li>
                                        <li><a href="#skills">Populares</a></li>
                                          <!--<li><a href="#gallery">Galería</a></li>-->
                                       <!--<li><a href="#team">Equipo</a></li>-->
                                      <li><a href="#contact">Contacto</a></li>
                                        @if(Auth::check()) {{-- verifico si inicio session--}}
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <i class="mdi-action-account-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ route('auth/logout') }}">Finalizar sesión</a></li>
                                            </ul>
                                        </li>
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <i class="fa fa-user"></i> <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a  href="#inicio_sesion" class="open-popup-link">Iniciar sesión</a></li>

                                                    <li><a href="#registro" class="open-popup-link">Registrarse</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                      <li class="arrow-top pull-right"><a href="#splash-image"></a></li>
                                    </ul>


                              </div><!-- /.navbar-collapse -->


                            </div><!-- /.container-fluid -->
                          </nav>
                    </div><!-- m-navbar -->
                </div><!-- l-navigation -->

                <!-- Modal Registro -->

                <div id="inicio_sesion" class="white-popup mfp-hide">
                    {!! Form::open(['route' => 'auth/login', 'class' => 'form-horizontal']) !!}
                        @include('partials.layout.login')
                        <div class="box-footer">
                            {!! Form::submit(trans('form.login.submit'),['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('password/email') }}" class="btn btn-primary">{{ trans('passwords.forgot') }}</a>
                        </div>
                    {!! Form::close() !!}
                </div>

                <div id="registro" class="white-popup mfp-hide">
                    {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}
                    @include('partials.layout.registro')
                    <div class="box-footer">
                        {!! Form::submit(trans('form.signup.submit'),['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>