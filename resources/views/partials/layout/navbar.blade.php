<div class="l-navigation-wrap menu-padd" id="l-navigation">
    <div class="m-navbar container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">

                <div class="l-logo">
                    <a href="#splash-image-wrap">
                        {!! Html::image('assets/img/logo.png', 'logo', array('class' => '')) !!}

                    </a>
                </div><!-- l-logo -->
                @include('partials.layout.menu')
            </div><!-- /.container-fluid -->
        </nav>
    </div><!-- m-navbar -->
</div><!-- l-navigation -->