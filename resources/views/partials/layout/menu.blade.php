@if(Auth::check()) {{-- verifico si inicio session--}}
<div class="collapse navbar-collapse" id="navbar">
    <ul class="nav navbar-nav navbar-right">
        <li class="active">
            <a href="#">
                Categorias
            </a>
        </li>
        <li class="">
            <a href="#" >
                Solicitudes
            </a>
        </li>
        <li class="">
            <a href="#">
                Panel
            </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="mdi-action-account-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('auth/logout') }}">Finalizar sesión</a></li>
            </ul>
        </li>
    </ul>
</div>
@else
<div class="collapse navbar-collapse" id="navbar">
    <ul class="nav navbar-nav navbar-right">
        <li class="">
            <a href="#" >
                Categorias
            </a>
        </li>
        <li class="">
            <a href="#" >
                Solicitudes
            </a>
        </li>
        <li class="">
            <a href="#" >
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
</div>
@endif