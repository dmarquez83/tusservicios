<!DOCTYPE Html>
<Html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('home.title') }}</title>

    <link rel="shortcut icon" href="img/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
    {!! Html::style('assets/inc/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/inc/bootstrap/css/bootstrap-theme.min.css') !!}
    {!! Html::style('assets/inc/bootstrap/css/bootstrap-reset.css') !!}
    {!! Html::style('assets/inc/flexslider/flexslider.css') !!}
    {!! Html::style('assets/inc/easy-pie-chart/demo/style.css') !!}
    {!! Html::style('assets/inc/magnific/dist/magnific-popup.css') !!}
    {!! Html::style('assets/inc/YTPlayer/css/YTPlayer.css') !!}
    {!! Html::style('assets/inc/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    {!! Html::style('assets/css/colors.css') !!}

</head>
<body>

    @if(\Session::has('message'))
        @include('home.partials.message')
    @endif



        <div class="page-loader"></div>

        <div class="l-wrapper">
            @yield('content')
        </div><!-- l-wrapper -->


    <!-- LOAD SCRIPTS -->
    {!! Html::script('assets/inc/js/jquery-1.11.0.min.js') !!}
    {!! Html::script('assets/inc/bootstrap/js/bootstrap.min.js') !!}

    <!-- flexslider -->
    {!! Html::script('assets/inc/flexslider/jquery.flexslider.js') !!}

    <!-- skrollr -->
    {!! Html::script('assets/inc/skrollr/dist/skrollr.min.js') !!}

    <!-- easy pie chart -->
    {!! Html::script('assets/inc/easy-pie-chart/dist/jquery.easypiechart.min.js') !!}

    <!-- isotope -->
    {!! Html::script('assets/inc/isotope/jquery.isotope.min.js') !!}
    {!! Html::script('assets/inc/isotope/jquery.isotope.sloppy-masonry.js') !!}

    <!-- nice scroll -->
    {!! Html::script('assets/inc/nice-scroll/jquery.nicescroll.min.js') !!}

    <!-- google maps -->
    {!! Html::script('https://maps.googleapis.com/maps/api/js?sensor=false') !!}

    <!-- Magnific Popup core JS file -->
    {!! Html::script('assets/inc/magnific/dist/jquery.magnific-popup.js') !!}

    <!-- Waypoints -->
    {!! Html::script('assets/inc/waypoints/waypoints.min.js') !!}

    <!-- YTP -->
    {!! Html::script('assets/inc/YTPlayer/inc/jquery.mb.YTPlayer.js') !!}

    <!-- TWITTER SCRIPT -->
    {!! Html::script('assets/inc/tweet/twitter/jquery.tweet.js') !!}

    <!-- contact form checker -->
    {!! Html::script('assets/inc/form-validator/dist/jquery.validate.js') !!}

    <!-- script calling -->
    {!! Html::script('assets/inc/js/common.js') !!}

</body>
</Html>
