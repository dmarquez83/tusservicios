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

    <script src="{{asset('assets/inc/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('assets/inc/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- flexslider -->
    <script src="{{asset('assets/inc/flexslider/jquery.flexslider.js')}}"></script>

    <!-- skrollr -->
    <script src="{{asset('assets/inc/skrollr/dist/skrollr.min.js')}}"></script>

    <!-- easy pie chart -->
    <script src="{{asset('assets/inc/easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

    <!-- isotope -->
    <script src="{{asset('assets/inc/isotope/jquery.isotope.min.js')}}" ></script>
    <script src="{{asset('assets/inc/isotope/jquery.isotope.sloppy-masonry.js')}}" ></script>

    <!-- nice scroll -->
    <script src="{{asset('assets/inc/nice-scroll/jquery.nicescroll.min.js')}}" ></script>

    <!-- google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <!-- Magnific Popup core JS file -->
    <script src="{{asset('assets/inc/magnific/dist/jquery.magnific-popup.js')}}"></script>

    <!-- Waypoints -->
    <script src="{{asset('assets/inc/waypoints/waypoints.min.js')}}"></script>

    <!-- YTP -->
    <script src="{{asset('assets/inc/YTPlayer/inc/jquery.mb.YTPlayer.js')}}"></script>

    <!-- TWITTER SCRIPT -->
    <script src="{{asset('assets/inc/tweet/twitter/jquery.tweet.js')}}"></script>

    <!-- contact form checker -->
    <script src="{{asset('assets/inc/form-validator/dist/jquery.validate.js')}}"></script>

    <!-- script calling -->
    <script src="{{asset('assets/inc/js/common.js')}}"></script>


</body>
</Html>
