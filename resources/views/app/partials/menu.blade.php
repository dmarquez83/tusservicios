<aside class="main-sidebar no-padding">
    <section class="sidebar">
        @if(Auth::check())
        @endif
        <ul class="sidebar-menu">



            <li class="treeview">
                <a href="{{ route ('categorias.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Categorias</span>
                </a>
            </li>

            <li class="list-seperator"></li>

            @if(Auth::check()) {{-- verifico si inicio session--}}
            <li class="header">Opciones de Administrador</li>


                @if(auth()->user()->id_tipo_usuario == '2')

                    <li class="treeview">
                        <a href="{!! route('user.dashborad') !!}">
                            <i class="glyphicon glyphicon-th"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{{ route ('user.servicios.index') }}" >
                            <i class="glyphicon glyphicon-wrench"></i>
                            <span>Mis Servicios</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route ('solicitudes.getlistado') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Solicitudes</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route ('solicitudes.getUsuariosSolicitudes') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Solicitudes Asignadas</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            <span>Pagos Realizados</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            <span>Pagos Recibidos</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->id_tipo_usuario == '1')

                    <li class="treeview">
                        <a href="{!! route('admin.dashborad') !!}">
                            <i class="glyphicon glyphicon-th"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route ('user.servicios.index') }}" >
                            <i class="glyphicon glyphicon-wrench"></i>
                            <span>Servicios de los usuarios</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('solicitudes.listado') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Solicitudes</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.categorias.index') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Tipo de Usuario</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.categorias.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Categorias</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.tiposervicios.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Tipo de Servicios</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.evaluaciones.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Evaluaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.ponderaciones.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Ponderaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.estatus.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Estatus</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.insumos.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Insumos</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.servicios.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Servicios</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.proveedores.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Proveedores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.horas.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Horas</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.dias.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Dias</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.ciudades.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Ciudades</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.sectores.index') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Sectores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            <span>Pagos Realizados</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            <span>Pagos Recibidos</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                @endif
            @else
                <li class="header">Opciones de Usuario</li>
                <li class="treeview active">
                    <a href="#">
                        <i class="glyphicon glyphicon-home"></i>
                        <span>Principal</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ route('categorias.index') }}">
                        <i class="glyphicon glyphicon-th"></i>
                        <span>Categorias</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#" >
                        <i class="glyphicon glyphicon-pencil"></i>
                        <span>Solicitudes</span>
                    </a>
                </li>


            @endif
        </ul>
    </section>
</aside>