<ul class="collection with-header no-border ">
    <li class="collection-header">
        <h5>Opciones</h5>
    </li>
    <li class="collection-item grey lighten-5 ">
        <a href="{!! route('categorias.index') !!}" class="black-text">
            Categorias <span  class="secondary-content black-text"><i class="material-icons">list</i></span>
        </a>
    </li>
    <li class="collection-item grey lighten-5 ">
        <a href="{!! route('solicitudes.index') !!}" class="black-text">
            Solicitudes <span  class="secondary-content black-text"><i class="material-icons">assignment</i></span>
        </a>
    </li>
    <li class="collection-item grey lighten-5 ">
        <a href="dashboard.php" class="black-text">
            Panel <span  class="secondary-content black-text"><i class="material-icons">dashboard</i></span>
        </a>
    </li>
    <li class="collection-item grey lighten-5 ">
        <a href="#!" class="black-text">
            Perfil <span  class="secondary-content black-text"><i class="material-icons">account_circle</i></span>
        </a>
    </li>
    <li class="collection-item grey lighten-5 ">
        <a href="{!! route('auth/logout') !!}" class="black-text">
            Cerrar Sesión
                            <span  class="secondary-content black-text">
                                <i class="material-icons">exit_to_app</i>
                            </span>
        </a>
    </li>
</ul>