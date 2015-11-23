<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        {!! Html::image('assets/img/logo.png', 'logo', array('class' => '')) !!}
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="glyphicon glyphicon-menu-hamburger"></span>
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
                    <a href="#"><i class="glyphicon glyphicon-off"></i></a>
                </li>
            @else
                <li class="dropdown user user-menu">
                    <a href="#">Iniciar Sesion
                        <i class="glyphicon glyphicon-user"></i>
                    </a>
                </li>
            @endif
            </ul>
        </div>
    </nav>
</header>
