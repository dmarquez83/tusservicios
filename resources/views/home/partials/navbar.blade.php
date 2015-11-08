<header class="navbar-fixed">
	<nav class="orange darken-2">
		<div class="nav-wrapper ">
            <a>  {!! Html::image('assets/img/logo.png', 'a picture', array('class' => '')) !!} </a>
            <ul class="right hide-on-small-only">
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                <li><a href="#">Conocenos</a></li>
                <li><a href="#">Contacto</a></li>
                @include('home.partials.menu')
            </ul>
        </div>
    </nav>
</header>