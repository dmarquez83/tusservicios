@if(Auth::check()) {{-- verifico si inicio session--}}
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Opciones de Usuario</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
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
                    <span>Servicios</span>
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