@if(Auth::check()) {{-- verifico si inicio session--}}
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="mdi-action-account-circle"></i> {{ Auth::user()->name }} <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('auth/logout') }}">Finalizar sesión</a></li>
    </ul>
</li>
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user"></i> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('auth/login') }}">Iniciar sesión</a></li>
            <li><a href="{{ route('auth/register') }}">Registrarse</a></li>
        </ul>
    </li>
@endif