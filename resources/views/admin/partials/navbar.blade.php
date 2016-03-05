<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo bg-navy">

        <span class="logo-mini">
            <img alt="logo" src="{{asset('/assets/img/thumb-tusservicios-logo.jpg')}}" class="img-circle" style="border:none;width: 45px">
        </span>
        <span class="logo-lg" style="margin-top: 0.2em;">
            <img alt="logo" src="{{asset('/assets/img/logo-hz.jpg')}}" class="no-margin" style="border:none;width: 160px;">
        </span>
    </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top bg-navy" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        @if(Auth::check())
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="{{  route('home') }}">
                            <i class="fa fa-user"></i>
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                    <li class="nav-divider"></li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </div>
        @else
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        @endif

    </nav>
</header>