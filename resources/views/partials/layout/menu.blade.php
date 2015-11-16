@if(Auth::check()) {{-- verifico si inicio session--}}
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">Opciones de Usuario</li>
                <li class="active">
                    <a href="#">
                        <i class="glyphicon glyphicon-home"></i> Principal
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-triangle-bottom"></i>
                        Panel
                    </a>
                </li>

                <li class="treeview">

                    <a href="#" >
                        <i class="glyphicon glyphicon-triangle-bottom"></i>
                        Solicitudes
                    </a>
                </li>
                <li class="treeview">

                    <a href="#">
                        <i class="glyphicon glyphicon-triangle-bottom"></i>
                        Panel
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-triangle-bottom"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="treeview-menu" style="list-style: none">
                        <li class="" title="Finalizar sesión">
                            <a href="#" data-ajax="false">
                                <i class="glyphicon glyphicon-triangle-right"></i>
                                Finalizar sesión
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
@else
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">Opciones de Usuario</li>
                <li class="active">
                    <a href="#">
                        <i class="glyphicon glyphicon-home"></i> Principal
                    </a>
                </li>
                <li class="treeview">
                    <i class="glyphicon glyphicon-triangle-bottom"></i>
                    <a href="#">
                        Panel
                    </a>
                </li>

                <li class="treeview">
                    <i class="glyphicon glyphicon-triangle-bottom"></i>
                    <a href="#" >
                        Solicitudes
                    </a>
                </li>
                <li class="treeview">
                    <i class="glyphicon glyphicon-triangle-bottom"></i>
                    <a href="#">
                        Panel
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user"></i> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('auth/login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ route('auth/register') }}">Registrarse</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
@endif