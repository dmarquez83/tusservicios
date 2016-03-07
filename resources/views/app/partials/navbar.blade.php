<nav class="navbar bg-orange-active flat navbar-home no-margin hidden-xs navbar-fixed-top">
    <div class="container">
        <div class="navbar-header text-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo-hz.jpg') }}" alt="logo" class="border-radius"/>
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li>
                        <a href="{{ route('home')}}" class="text-white">
                            <i class="fa fa-home"></i> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="text-white">
                            <i class="fa fa-user"></i> Perfil
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-white">
                            <i class="fa fa-info-circle"></i> Ayuda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="text-white">
                            <i class="fa fa-power-off"></i> Salir
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('registro')}}" class="text-white">
                            <i class="fa fa-user"></i> Registro
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="text-white">
                            <i class="fa fa-sign-in"></i> Acceso
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-white">
                            <i class="fa fa-info-circle"></i> Ayuda
                        </a>
                    </li>
                @endif
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="input-group input-group-sm margin-05">
                    <input type="text" class="form-control" placeholder="Buscar servicio" style="width: 100% ">
                    <span class="input-group-btn">
                      <button class="btn bg-navy btn-flat" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                    </span>
                </div>
            </form>


        </div>
    </div>
</nav>
<div class="container-fluid bg-orange-active hidden-lg hidden-md hidden-sm navbar-fixed-top" >
    <div class="row">
        <div class="col-xs-12 text-center margin-top margin-bottom">
            <a class="" href="#">
                <img src="{{ asset('assets/img/logo-hz.jpg') }}" alt="logo" class="border-radius"/>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="list-inline text-center menu-hz">
                @if(Auth::check())
                    <li>
                        <a href="{{ route('home')}}" class="text-white">
                            <i class="fa fa-home"></i> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="text-white">
                            <i class="fa fa-user"></i> Perfil
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-white">
                            <i class="fa fa-info-circle"></i> Ayuda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="text-white">
                            <i class="fa fa-power-off"></i> Salir
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('registro')}}" class="text-white">
                            <i class="fa fa-user"></i> Registro
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="text-white">
                            <i class="fa fa-sign-in"></i> Acceso
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-white">
                            <i class="fa fa-info-circle"></i> Ayuda
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!--<div class="col-xs-2">
            <a href="#" class="sidebar-toggle text-white" data-toggle="offcanvas" role="button">
                <i class="fa fa-bars"></i>
            </a>
        </div>-->
    </div>
</div>
