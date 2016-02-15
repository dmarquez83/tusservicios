<nav class="navbar bg-blue-active flat navbar-home no-margin hidden-xs navbar-fixed-top">
    <div class="container">
        <div class="navbar-header text-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo-hz.jpg') }}" alt="logo" class="border-radius"/>
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right margin-top">
                <li>
                    <a href="" class="text-white">
                        <i class="fa fa-user"></i> Registro
                    </a>
                </li>
                <li>
                    <a href="" class="text-white">
                        <i class="fa fa-sign-in"></i> Acceso
                    </a>
                </li>
                <li>
                    <a href="" class="text-white">
                        <i class="fa fa-info-circle"></i> Ayuda
                    </a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="input-group input-group-sm margin-top">
                    <input type="text" class="form-control" placeholder="Buscar servicio">
                    <span class="input-group-btn">
                      <button class="btn bg-orange-active btn-flat" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                    </span>
                </div>
            </form>


        </div>
    </div>
</nav>
<div class="container-fluid bg-blue-active hidden-lg hidden-md hidden-sm navbar-fixed-top" >
    <div class="row">
        <div class="col-xs-12 text-center margin-top margin-bottom">
            <a class="" href="#">
                <img src="{{ asset('assets/img/logo-hz.jpg') }}" alt="logo" class="border-radius"/>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10">
            <ul class="list-inline text-center menu-hz">
                <li>
                    <a href="" class="text-white">
                        <i class="fa fa-user"></i> Registro
                    </a>
                </li>
                <li>
                    <a href="" class="text-white">
                        <i class="fa fa-sign-in"></i> Acceso
                    </a>
                </li>
                <li>
                    <a href="" class="text-white">
                        <i class="fa fa-info-circle"></i> Ayuda
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-xs-2">
            <a href="#" class="sidebar-toggle text-white" data-toggle="offcanvas" role="button">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
</div>