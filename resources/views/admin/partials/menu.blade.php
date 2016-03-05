<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="list-seperator"></li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-inbox"></i>
                    <span>Solicitudes</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="list-seperator"></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Servicios</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="{{ route ('admin.categorias.index') }}">
                            <i class="fa fa-list"></i> Categorias
                        </a>
                    </li>
                    <li>
                        <a href="{{ route ('admin.servicios.index') }}">
                            <i class="fa fa-list"></i> Servicios
                        </a>
                    </li>
                    <li>
                        <a href="{{ route ('admin.servicios.index') }}">
                            <i class="fa fa-users"></i> Proveedores
                        </a>
                    </li>
                </ul>
            </li>

            <li class="list-seperator"></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Insumos</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li>
                        <a href="{{ route ('admin.insumos.index') }}">
                            <i class="fa fa-list"></i> Insumos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route ('admin.servicios.index') }}">
                            <i class="fa fa-users"></i> Proveedores
                        </a>
                    </li>
                </ul>
            </li>

            <li class="list-seperator"></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-map-marker"></i>
                    <span>Lugares</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="list-seperator"></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-inbox"></i>
                    <span>Solicitudes</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>


        </ul>
    </section>
</aside>