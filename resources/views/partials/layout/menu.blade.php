@if(Auth::check()) {{-- verifico si inicio session--}}
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Opciones de Usuario</li>
            <li class="treeview active">
                <a href="#">
                    <i class="glyphicon glyphicon-home"></i> Principal
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-th"></i>
                    Categorias
                </a>
            </li>

            <li class="treeview">

                <a href="#" >
                    <i class="glyphicon glyphicon-pencil"></i>
                    Servicios
                </a>
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
                <li class="treeview active">
                    <a href="#">
                        <i class="glyphicon glyphicon-home"></i> Principal
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-th"></i>
                        Categorias
                    </a>
                </li>

                <li class="treeview">

                    <a href="#" >
                        <i class="glyphicon glyphicon-pencil"></i>
                        Solicitudes
                    </a>
                </li>
            </ul>
        </section>
    </aside>
@endif
