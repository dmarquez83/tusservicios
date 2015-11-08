<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('home.title') }}</title>

    <link rel="shortcut icon" href="img/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
    {!! HTML::style('assets/inc/bootstrap/css/bootstrap.min.css') !!}}}
    {!! HTML::style('assets/inc/bootstrap/css/bootstrap-theme.min.css') !!}}}
    {!! HTML::style('assets/inc/bootstrap/css/bootstrap-reset.css') !!}}}
    {!! HTML::style('assets/inc/flexslider/flexslider.css') !!}}}
    {!! HTML::style('assets/inc/easy-pie-chart/demo/style.css') !!}}}
    {!! HTML::style('assets/inc/magnific/dist/magnific-popup.css') !!}}}
    {!! HTML::style('assets/inc/YTPlayer/css/YTPlayer.css') !!}}}
    {!! HTML::style('assets/inc/font-awesome/css/font-awesome.min.css') !!}}}
    {!! HTML::style('assets/css/style.css') !!}}}
    {!! HTML::style('assets/css/colors.css') !!}}}

</head>
<body>

    @if(\Session::has('message'))
        @include('home.partials.message')
    @endif



    <div class="page-loader"></div>

    <div class="l-wrapper">

        <!-- HEADER -->
        <header>
            <?php include_once 'header.html'; ?>
        </header>

        <div class="menu-wrap">
            <?php include_once 'menu.html'; ?>
        </div><!-- content -->


        <div class="l-content-wrap" id="standard-content">

            <section>

                <?php include_once 'home.html'; ?>

            </section>


            <!-- WHAT WE DO PARALAX SECTION -->
            <section>

                <?php include_once 'que_hacemos.html'; ?>

            </section>



            <!-- LATEST POSTS SECTION -->
            <section>

                <?php include_once 'noticias.html'; ?>

            </section>

            <!-- TESTIMONIALS PARALAX SECTION -->
            <section>

                <?php include_once 'testimonios.html'; ?>

            </section>

            <!-- TECHNICAL SKILLS SECTION -->
            <section>

                <?php include_once 'skills.html'; ?>

            </section>

            <!-- GALLERY SECTION -->
            <section>

                <?php include_once 'galeria.html'; ?>

            </section>




            <!-- LATEST POSTS SECTION -->
            <section>

                <?php include_once 'contact.html'; ?>

            </section>




            <!-- TECHNICAL SKILLS SECTION -->
            <section>

                <?php include_once 'contact2.html'; ?>

            </section>

        </div><!-- l-content-wrap -->

    </div><!-- l-wrapper -->


    <!-- LOAD SCRIPTS -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="inc/bootstrap/js/bootstrap.min.js"></script>

    <!-- flexslider -->
    <script src="inc/flexslider/jquery.flexslider.js"></script>

    <!-- skrollr -->
    <script type="text/javascript" src="inc/skrollr/dist/skrollr.min.js"></script>

    <!-- easy pie chart -->
    <script src="inc/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

    <!-- isotope -->
    <script src="inc/isotope/jquery.isotope.min.js" ></script>
    <script src="inc/isotope/jquery.isotope.sloppy-masonry.js" ></script>

    <!-- nice scroll -->
    <script src="inc/nice-scroll/jquery.nicescroll.min.js" ></script>

    <!-- google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <!-- Magnific Popup core JS file -->
    <script src="inc/magnific/dist/jquery.magnific-popup.js"></script>

    <!-- Waypoints -->
    <script src="inc/waypoints/waypoints.min.js"></script>

    <!-- YTP -->
    <script type="text/javascript" src="inc/YTPlayer/inc/jquery.mb.YTPlayer.js"></script>

    <!-- TWITTER SCRIPT -->
    <script type="text/javascript" charset="utf-8" src="inc/tweet/twitter/jquery.tweet.js"></script>

    <!-- contact form checker -->
    <script src="inc/form-validator/dist/jquery.validate.js"></script>

    <!-- script calling -->
    <script src="inc/js/common.js"></script>


    @include('home.partials.navbar')

    <div class="row">

        <div class="col s12 m4 l2 hide-on-med-and-down">
            @include('home.partials.menu-user')
        </div>

        @include('home.partials.errors')

        <div class="col m12 l10"> <!-- Note that "m8 l9" was added -->
            @yield('content')
        </div>

    </div>

    @include('home.partials.footer')

    <script>
        $(function () {
            $('select').material_select();
            $('.button-collapse').sideNav({
                        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
                    }
            );
        });
    </script>
</body>
</html>
