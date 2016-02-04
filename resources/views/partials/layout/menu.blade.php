@if(Auth::check()) {{-- verifico si inicio session--}}
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Opciones de Administrador</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Principal</span>
                </a>
            </li>

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
                        <span>Mis Solicitudes</span>
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
                    <a href="{!! route('user.dashborad') !!}">
                        <i class="glyphicon glyphicon-th"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{ route ('user.servicios.index') }}" >
                        <i class="glyphicon glyphicon-wrench"></i>
                        <span>Servicios</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{ route('admin.proveedores.index') }}">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Proveedores</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span>Mis Solicitudes</span>
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
                        <i class="glyphicon glyphicon-briefcase"></i>
                        <span>Mis Servicios</span>
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
                        <i class="glyphicon glyphicon-pencil"></i>
                        <span>Registro de Insumos</span>
                    </a>
                </li>
            @endif

        </ul>
    </section>
</aside>
@else
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
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
        </ul>
    </section>
</aside>
@endif